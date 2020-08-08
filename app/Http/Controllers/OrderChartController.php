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
        // $startDay = $currentDay->startOfMonth()->format('Y-m-d');
        // $endDay = $currentDay->endOfMonth()->format('Y-m-d');
        // $daysInMonth = DB::table('orders_out')
        // ->select(DB::raw('Date(created_at) ngay'))->distinct()
        // ->whereBetween(DB::raw('Date(created_at)'), array($startDay, $endDay))
        // ->orderBy('ngay', 'asc')
        // ->get();
        // $daysInMonth = $daysInMonth->pluck("ngay")->toArray();

        // $orders_dayInMonth = DB::table('orders_out')
        //                 ->select(DB::raw('count(*) don_trong_thang'))
        //                 ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        //                 ->groupBy(DB::raw('Date(created_at)'))
        //                 ->get();
        // $orders_dayInMonth = $orders_dayInMonth->pluck("don_trong_thang")->toArray();
        
        // $countOrder = 0;
        // for($i = 0; $i < count($daysInMonth); $i++) {
        //     $start =  $currentDay->startOfMonth();
        //     for($j = 0; $j < $currentDay->daysInMonth; $j++) {
        //         if($j != 0) {
        //             $start->addDay();
        //         }
        //         if($daysInMonth[$i] == $start->toDateString())
        //         {
        //             $countOrder++;
        //         }
        //     }
        // }
        // dd($countOrder);



        // dd($arr);
        // dd($daysInMonth);
        // echo $endDay->addDays(29)->format('Y-m-d'). '</br>';                  
        // echo $endDay->addDay()->format('Y-m-d'). '</br>';                   
        // echo $endDay->subDay()->format('Y-m-d'). '</br>';                     
        // echo $endDay->subDays(29)->format('Y-m-d'). '</br>'; 
        // dd($startDay,$endDay);
        // between >= startDay < endDay nên phải + thêm 1 ngày
        // $total_by_day = $total_by_day->pluck("tien_trong_ngay")->toArray();
        // $newArray = [];
        // foreach($total_by_day as $item )
        // {
        //     array_push($newArray,number_format($item,0,".","."));
        // }
        // // dd($newArray);
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
