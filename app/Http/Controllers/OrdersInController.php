<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders_in;

class OrdersInController extends Controller
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
        $orders_in = Orders_in::all();
        return view('OrdersIn.list',compact('orders_in'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders_in_detail = Orders_in::find($id)->OrdersInDetail;
       return view('OrdersInDetail.list',compact('orders_in_detail'));
    }
}
