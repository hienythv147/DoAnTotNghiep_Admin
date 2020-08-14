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
        ->where('status', '=', 3)
        ->orWhere('status', '=', 4)
        ->orderBy('ngay', 'asc')
        ->get();
        $daysInMonth = $daysInMonth->pluck("ngay")->toArray();
        // dd($daysInMonth);
        $daysInMonth = json_encode($daysInMonth);
        

        // tổng đơn 
        $orders_dayInMonth = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 3)
                        ->orWhere('status', '=', 4)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_dayInMonth = $orders_dayInMonth->pluck("don_trong_thang")->toArray();
        $orders_dayInMonth = json_encode($orders_dayInMonth);

        $total_dayInMonth = DB::table('orders_out')
        ->select(DB::raw('sum(total) tien_trong_thang'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
        ->where('status', '=', 3)
        ->orWhere('status', '=', 4)
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $total_dayInMonth = $total_dayInMonth->pluck("tien_trong_thang")->toArray();
        $total_dayInMonth = json_encode($total_dayInMonth);

        // Lấy tổng đơn hoàn thành các ngày trong tuần statuc = 3 hoàn thành
        $orders_complete = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_ht_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 3)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_complete = $orders_complete->pluck("don_ht_trong_thang")->toArray();
        $orders_complete = json_encode($orders_complete);

        // Lấy tổng tiền hoàn thành
        $total_complete = DB::table('orders_out')
        ->select(DB::raw('sum(total) tien_ht_trong_thang'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
        ->where('status', '=', 3)
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $total_complete = $total_complete->pluck("tien_ht_trong_thang")->toArray();
        $total_complete = json_encode($total_complete);

        // status = 4 hủy
        $orders_fail = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_cho_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 4)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_fail = $orders_fail->pluck("don_cho_trong_thang")->toArray();
        $orders_fail = json_encode($orders_fail);

        return view('Dashboard.statistic',compact('daysInMonth','orders_dayInMonth','total_dayInMonth','orders_complete','total_complete'));
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
