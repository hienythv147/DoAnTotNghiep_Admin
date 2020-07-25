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
}
