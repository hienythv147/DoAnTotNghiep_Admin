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
        $orders_out = Orders_out::all();
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
       return view('OrdersOutDetail.list',compact('orders_out_detail'));
    }

    public function confirmOrder($id) {
        $orders_out = Orders_out::find($id);
        $orders_out->status = 1;
        $result = $orders_out->save();
        if($result) {
            return back()->with('message_success','Đơn hàng đã được xác nhận!');
        } else {
            return back()->with('message_error','Xác nhận đơn hàng không thành công!');
        }
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
            $orders_out = Orders_out::all();
        } else {
            $orders_out = Orders_out::where('status', $status)->get();
        }
        return view('OrdersOut.list', compact('orders_out'));
    }
}
