<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Orders_out;
use App\Orders_out_detail;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function processPayment(Request $request) {
        $this->saveNewAddress($request->address);
        $data = $request->session()->get('cart', null);
        $total = 0;
        if(!empty($data)) {
            foreach($data as $item) {
                $total += $item['price'] * $item['amount'];
            }
        } else {
            session()->flash('message_error', 'Giỏ hàng rỗng');
            return redirect()->back();
        }
        $userId =  Auth::user()['id'];
        $roleId = Auth::user()['role_id'];
        $userEmail =  Auth::user()['email'];
        // Check payment momo
        if($request->momo == 'on') {
            $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
            $partnerCode = 'MOMORPLR20200727';
            $accessKey = '5HrD4Ed8cgIuoLnu';
            $serectkey = 'hOoRGC1IcOLQOpG5NQICKjTDuKnVGYfj';
            $orderId = time() . "";
            $orderInfo = "Thanh toán Momo";
            $amount = $total . "";
            $notifyurl = 'Http://'.$_SERVER['HTTP_HOST'];
            $returnUrl = 'Http://'.$_SERVER['HTTP_HOST'].'/process-result-momo';
            $extraData = "merchantName=MOMORPLR20200727";

            $requestId = time() . "";
            $extraData = "email=abc@gmail.com";
            $requestType = "captureMoMoWallet";
            $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
            $signature = hash_hmac("sha256", $rawHash, $serectkey);
            $dataMomo = [
                'partnerCode' => $partnerCode,
                'accessKey' => $accessKey,
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'returnUrl' => $returnUrl,
                'notifyUrl' => $notifyurl,
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            ];
            $response = Http::post($endpoint, $dataMomo);
            $jsonResult = json_decode($response, true);
            // check response OK
            if($jsonResult['errorCode'] == 0) {
                return redirect()->to($jsonResult['payUrl'])->send();
            }
        }   
        $result = $this->createOrder($data, $total, $userId, $roleId, $userEmail);
        return redirect($result);
    }

    // save new address
    public function saveNewAddress($newAddress) {
        $data = User::find(Auth::user()['id']);
        if($data['address'] !== $newAddress) {
            $data->address = $newAddress;
            $data->save();
        } 
    }

    // Send mail by Sendgrid
    public function sendMail($orderId, $total, $data, $created_at, $userEmail = null, $isUser = false) {
        // mail from
        $emailFrom = "xuansang3105@gmail.com";
        // name from
        $nameFrom = "Cafe SP";
        // subject
        $subject = "Đơn Hàng Của Bạn!";
        // name to
        $nameTo = "Cafe SP";
        // sendgrid key
        $key = "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";
        // content email
        $content = file_get_contents(dir(getcwd())->path . '\emails\notification-order.txt');
        // get list products
        $arrayProduct = [];
        foreach($data as $item) {
            $listProducts = "<tr>" .
                                "<td>" . $item['name'] . "</td>" .
                                "<td style='margin-left: 20px'>" . $item['amount'] . "x</td>" .
                                "<td style='margin-left: 20px'>" . number_format($item['price'], "0", ".", ".") . "VND</td>" .
                             "</tr>";
            array_push($arrayProduct, $listProducts);
        }
        $listProducts = implode("", $arrayProduct);
        // get url order 
        $urlOrder = 'http://'.$_SERVER['HTTP_HOST'].'/Admin/orders-out/detail/'.$orderId;
        // get new content email
        $newContent = str_replace('order_id', $orderId, $content);
        $newContent = str_replace('datetime_order', $created_at->format('d-m-yy H:i:s'), $newContent);
        $newContent = str_replace('expected_time', '45 phút', $newContent);
        $newContent = str_replace('list_products', $listProducts, $newContent);
        $newContent = str_replace('sub_total', number_format($total, "0", ".", ".").' VNĐ', $newContent);
        $newContent = str_replace('gif_code', '0 VNĐ', $newContent);
        $newContent = str_replace('ship_code', '15.000 VNĐ', $newContent);
        $newContent = str_replace('grand_total', number_format($total + 15000, "0", ".", ".") . " VNĐ", $newContent);
        if($isUser) {
            $newContent = str_replace('url_order', 'http://'.$_SERVER['HTTP_HOST'].'/history-order', $newContent);
        } else {
            $newContent = str_replace('url_order', $urlOrder, $newContent);
        }
        // check email to not null
        if(!empty($userEmail)) {
            $emailTo = $userEmail;
        } else {
            $emailTo = "hienythv147@gmail.com";
        }
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom($emailFrom, $nameFrom);
        $email->setSubject($subject);
        $email->addTo($emailTo, $nameTo);
        $email->addContent('text/html', $newContent);
        $sendgrid = new \SendGrid($key);
        $response = $sendgrid->send($email);
        return $response;
    }

    public function createOrder($data, $total, $userId, $roleId, $userEmail) {
        if(!empty($data)) {
            $order = new Orders_out();
            // check role is staff
            $order->user_id = $userId;
            $order->total = $total;
            $result = $order->save();
            if($result == false) {
                session()->flash('message_error', 'Thanh toán thất bại. Vui lòng thử lại sau');
                return '/cart';
            }
            // get created date
            $created_at = Carbon::now('Asia/Ho_Chi_Minh');
            // get last id of table order
            $orderId = Orders_out::all()->last()['id'];
            // save new order detail
            foreach($data as $item) {
                $orderDetail = new Orders_out_detail();
                $orderDetail->order_out_id = $orderId;
                $orderDetail->product_id = $item['id'];
                $orderDetail->price = $item['price'];
                $orderDetail->amount = $item['amount'];
                $resultDetail = $orderDetail->save();
                if($resultDetail == false) {
                    session()->flash('message_error', 'Thanh toán thất bại. Vui lòng thử lại sau');
                    return '/cart';
                }
            }
            // send mail if user is customer
            if($roleId == 3) {
                $this->sendMail($orderId, $total, $data, $created_at, $userEmail, true);
            }
            // send email for admin
            $this->sendMail($orderId, $total, $data, $created_at);
            // clear order session
            Session::pull('cart');
            // flash session
            session()->flash('message_success', 'Thanh toán thành công');
            return "/home";
        }
        session()->flash('message_error', 'Giỏ hàng rỗng');
        return "/cart";
    }

    public function processResultMomo(Request $request) {
        if($request->errorCode == 0) {
            $data = $request->session()->get('cart', null);
            $total = 0;
            if(!empty($data)) {
                foreach($data as $item) {
                    $total += $item['price'] * $item['amount'];
                }
            } else {
                session()->flash('message_error', 'Giỏ hàng rỗng');
                return redirect('/cart');
            }
            $userId =  Auth::user()['id'];
            $roleId = Auth::user()['role_id'];
            $userEmail =  Auth::user()['email'];
            // create order
            $result = $this->createOrder($data, $total, $userId, $roleId, $userEmail);
            return redirect($result);
        }
        session()->flash('message_error', $request->localMessage);
        return redirect('/cart');
    }

    public function historyOrder() {
        if(Auth::user()->role_id == 3)
        {
            $orders = Orders_out::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);
            return view('home.history_order', compact('orders'));
        }
        else
        {
            return view('errors.404');
        }
        
    }

    public function historyOrderDetail(Request $request) {
        $orderId = $request->id;
        if ($request->ajax()) {
            if(!empty($orderId)) {
                $query = DB::table('orders_out')
                ->join('orders_out_detail', 'orders_out.id', '=', 'orders_out_detail.order_out_id')
                ->join('products', 'products.id', '=', 'orders_out_detail.product_id')
                ->select('products.name', 'orders_out_detail.price', 'orders_out_detail.amount')
                ->where('orders_out.id', '=', $orderId)
                ->get();
                return response()->json($query->toArray());
            }
        }
    }
}
