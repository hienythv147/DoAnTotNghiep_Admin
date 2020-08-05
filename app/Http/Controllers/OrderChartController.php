<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\Orders_out;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Raw expression
        //Số đơn hoàn thành trong ngày
        // SELECT COUNT(*) FROM orders_out WHERE status = 1 GROUP BY created_at
        // Tổng tiền các đơn hoàn thành trong ngày
        // SELECT sum(total) FROM orders_out WHERE status = 1 GROUP BY created_at
        // Tổng đơn các ngày trong tuần
        // SELECT COUNT(*) FROM orders_out WHERE created_at BETWEEN '2020-08-03' and '2020-08-08' GROUP by created_at  
        // $currentDay = Carbon::now();
        // $startDay = $currentDay->startOfWeek()->format('Y-m-d');
        // $endDay = $currentDay->endOfWeek()->addDay()->format('Y-m-d');
        // echo $endDay->addDays(29)->format('Y-m-d'). '</br>';                  
        // echo $endDay->addDay()->format('Y-m-d'). '</br>';                   
        // echo $endDay->subDay()->format('Y-m-d'). '</br>';                     
        // echo $endDay->subDays(29)->format('Y-m-d'). '</br>'; 
        // dd($startDay,$endDay);
        // between >= startDay < endDay nên phải + thêm 1 ngày
        // $orders_dayOfWeek = DB::table('orders_out')
        //                 ->select(DB::raw('count(*) don_trong_ngay'))
        //                 ->whereBetween('created_at',array($startDay.'%', $endDay.'%'))
        //                 ->where('status', '=', 1)
        //                 ->groupBy(DB::raw('Date(created_at)'))
        //                 ->get();
        // // dd($orders_dayOfWeek);
        // $orders_dayOfWeek = $orders_dayOfWeek->pluck("don_trong_ngay")->toArray();
        // dd($orders_dayOfWeek);

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
