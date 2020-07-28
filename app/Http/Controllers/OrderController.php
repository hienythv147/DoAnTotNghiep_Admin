<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders_out;
use App\Orders_out_detail;
use Session;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function createOrder(Request $request) {
        $order = new Orders_out();
        $data = $request->session()->get('cart', null);
        if(!empty($data)) {
            $total = 0;
            // save new order
            foreach($data as $item) {
                $total += $item['price'] * $item['amount'];
            }
            $userId =  Auth::user()['id'];
            $userEmail =  Auth::user()['email'];
            // check role is staff
            $order->user_id = $userId;
            $order->total = $total;
            $result = $order->save();
            if($result == false) {
                session()->flash('message_error', 'Thanh toán thất bại. Vui lòng thử lại sau');
                return redirect()->back();
            }
            // save new order detail
            // get last id of table order
            $orderId = Orders_out::all()->last()['id'];
            foreach($data as $item) {
                $orderDetail = new Orders_out_detail();
                $orderDetail->order_out_id = $orderId;
                $orderDetail->product_id = $item['id'];
                $orderDetail->price = $item['price'];
                $orderDetail->amount = $item['amount'];
                $resultDetail = $orderDetail->save();
                if($resultDetail == false) {
                    session()->flash('message_error', 'Thanh toán thất bại. Vui lòng thử lại sau');
                    return redirect()->back();
                }
            }
            // send mail if user is customer
            if($userId == 3) {
                $this->sendMail($orderId, $total, $data, $userEmail, true);
            }
            // send email for admin
            $this->sendMail($orderId, $total, $data);
            // clear order session
            $request->session()->pull('cart');
            // flash session
            session()->flash('message_success', 'Thanh toán thành công');
            return redirect('/home');
        }
        session()->flash('message_error', 'Giỏ hàng rỗng');
        return redirect()->back();
    }

    // Send mail by Sendgrid
    public function sendMail($orderId, $total, $data, $userEmail = null, $isUser = false) {
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
                                "<td style='margin-left: 20px'>x" . $item['amount'] . "</td>" .
                                "<td style='margin-left: 20px'>" . $item['price'] . "VND</td>" .
                             "</tr>";
            array_push($arrayProduct, $listProducts);
        }
        $listProducts = implode("", $arrayProduct);
        // get url order 
        $urlOrder = 'http://'.$_SERVER['HTTP_HOST'].'/Admin/orders-out/detail/'.$orderId;
        // get new content email
        $newContent = str_replace('order_id', $orderId, $content);
        $newContent = str_replace('expected_time', '45 phút', $newContent);
        $newContent = str_replace('list_products', $listProducts, $newContent);
        $newContent = str_replace('sub_total', $total.'VND', $newContent);
        $newContent = str_replace('gif_code', '0VND', $newContent);
        $newContent = str_replace('ship_code', '15000VND', $newContent);
        $newContent = str_replace('grand_total', $total + 15000 . "VND", $newContent);
        if($isUser) {
            $newContent = str_replace('url_order', 'http://'.$_SERVER['HTTP_HOST'], $newContent);
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

    public function paymentMomo() {
        
    }
}
