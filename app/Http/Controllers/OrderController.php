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
                $total += $item['price'];
            }
            $userId =  Auth::user()['id'];
            // check role is staff
            if(Auth::user()['role_id'] == 1 || Auth::user()['role_id'] == 2) {
                $order->staff_id = $userId;
            } else {
                $order->customer_id = $userId;
            }
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
            $request->session()->pull('cart');
            session()->flash('message_success', 'Thanh toán thành công');
            return redirect('/home');
        }
        session()->flash('message_error', 'Giỏ hàng rỗng');
        return redirect()->back();
    }
}
