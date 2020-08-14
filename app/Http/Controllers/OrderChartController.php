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
    public function index(Request $request)
    {
        $startDay = '';
        $endDay = '';
        if($request->post())
        {
            if(!empty($request->all()))
            {
                $startDay = $request->startDay;
                $endDay = $request->endDay;
            }
        }
        else
        {
            $currentDay = Carbon::now();
            $startDay = $currentDay->startOfMonth()->format('Y-m-d');
            $endDay = $currentDay->endOfMonth()->format('Y-m-d');
        }
        // Tổng đơn các ngày trong tháng
        
        // dd($startDay,$endDay);
        $daysInMonth = DB::table('orders_out')
        ->select(DB::raw('Date(created_at) ngay'))->distinct()
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
        ->orderBy('ngay', 'asc')
        ->get();
        $daysInMonth = $daysInMonth->pluck("ngay")->toArray();
        // dd($daysInMonth);
        $daysInMonth = json_encode($daysInMonth);

        $orders_dayInMonth = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_dayInMonth = $orders_dayInMonth->pluck("don_trong_thang")->toArray();
        $orders_dayInMonth = json_encode($orders_dayInMonth);


        // Lấy tổng đơn hoàn thành các ngày trong tuần
        $orders_complete = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_ht_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 4)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_complete = $orders_complete->pluck("don_ht_trong_thang")->toArray();
        $orders_complete = json_encode($orders_complete);

        $orders_fail = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_cho_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 5)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_fail = $orders_fail->pluck("don_cho_trong_thang")->toArray();
        $orders_fail = json_encode($orders_fail);

        return view('Dashboard.statistic',compact('daysInMonth','orders_dayInMonth','orders_complete'));
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
