<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders_out;

class OrdersOutController extends Controller
{
    // Xác thực
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders_out = Orders_out::select()->orderBy('created_at', 'desc')->get();
        return view('OrdersOut.list',compact('orders_out'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders_out_detail = Orders_out::find($id)->OrdersOutDetail;
        $listStatus = ["Chờ xác nhận", "Đang xử lý", "Giao hàng", "Đã hoàn tất", "Đã hủy"];
        $order = Orders_out::select('id', 'status')->where('id', $id)->first();
        $orderStatus = $order['status'];
        $orderId = $order['id'];
        return view('OrdersOutDetail.list',compact('orders_out_detail', 'listStatus', 'orderStatus', 'orderId'));
    }

    public function editStatus(Request $request) {
        $orders_out = Orders_out::find($request->order_id);
        $orders_out->status = $request->status;
        $result = $orders_out->save();
        if($result) {
            return back()->with('message_success','Trạng thái đơn hàng đã được cập nhật');
        } else {
            return back()->with('message_error','Cập nhật đơn hàng không thành công!');
        }
    }

    public function confirmOrder($id) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByStatus(Request $request)
    {
        $status = $request->id;
        if($status == 5) {
            $orders_out = Orders_out::select()->orderBy('created_at', 'desc')->get();
        } else {
            $orders_out = Orders_out::select()->where('status', $status)->orderBy('created_at', 'desc')->get();
        }
        return view('OrdersOut.list', compact('orders_out'));
    }
}
