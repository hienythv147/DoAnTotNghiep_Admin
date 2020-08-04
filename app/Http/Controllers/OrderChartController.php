<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\Orders_out;
use Illuminate\Support\Facades\DB;
class OrderChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Orders_out::all();

        // $keys = Orders_out::all()->modelKeys();
        // dd($keys);

        // $values = Orders_out::pluck("total")->toArray() ;
        // dd($values);

        // Tổng đơn trong ngày
        // $orders_queue = DB::table('orders_out')
        //                 ->select(DB::raw('count(*) don_trong_ngay'))
        //                 ->groupBy('created_at')
        //                 ->get();
        // $orders_queue = $orders_queue->pluck("don_trong_ngay")->toArray();

        // Raw expression
        //Số đơn hoàn thành trong ngày
        // SELECT COUNT(*) FROM orders_out WHERE status = 1 GROUP BY created_at
        // Lấy tổng đơn hoàn thành theo ngày
        // $orders_day = DB::table('orders_out')
        //              ->select(DB::raw('count(*) don_ht_trong_ngay'))
        //              ->where('status', '=', 1)
        //              ->groupBy('created_at')
        //              ->get();
        // $orders_day = $orders_day->pluck("don_trong_ngay")->toArray();


        // //Tổng tiền các đơn hoàn thành trong ngày
        // // SELECT sum(total) FROM orders_out WHERE status = 1 GROUP BY created_at
        // $total_by_day = DB::table('orders_out')
        // ->select(DB::raw("sum(total) tien_trong_ngay"))
        // ->where('status', '=', 1)
        // ->groupBy('created_at')
        // ->get();
        // $total_by_day = $total_by_day->pluck("tien_trong_ngay")->toArray();
        // return response()->json($days);

        return view('Dashboard.statistic');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
