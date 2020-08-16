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
        $startDay = null;
        $endDay = null;
        if($request->post())
        {
            $this->validate($request,
            [
                'startDay' => ['required','date'],
                'endDay' => ['required','date']
            ],
            [
                'startDay.required' => 'Ngày bắt đầu không được bỏ trống.',
                'endDay.required' => 'Ngày kết thúc không được bỏ trống.',
                'startDay.date' => 'Ngày bắt đầu không hợp lệ.',
                'endDay.date' => 'Ngày kết thúc không hợp lệ'
            ]);
            $startDay = $request->startDay;
            $endDay = $request->endDay;
            if(strtotime($startDay)>strtotime($endDay))
            {
                return back()->with('message_error','Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.');
            }
            
        }
        else
        {
            $currentDay = Carbon::now();
            $startDay = $currentDay->startOfMonth()->format('Y-m-d');
            $endDay = $currentDay->endOfMonth()->format('Y-m-d');
        }
        // SELECT DISTINCT date(`created_at`) ngay FROM `orders_out` WHERE date(`created_at`) BETWEEN '2020-08-02' AND '2020-08-05' Order By `created_at` ASC
        // dd($startDay,$endDay);
        $daysInMonth = Orders_out::select(DB::raw('Date(created_at) ngay'))->distinct()
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        ->orderBy('ngay', 'asc')
        ->get();
        $daysInMonth = $daysInMonth->pluck("ngay")->toArray();
        
        // dd($daysInMonth);   
        // tổng đơn 
        // SELECT * from `orders_out` where (`status` = 3  OR `status` = 4) AND (date(`created_at`) BETWEEN '2020-08-14' AND '2020-08-14')
        $orders_dayInMonth = DB::table('orders_out')
        ->select(DB::raw('count(*) don_trong_thang'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        ->whereIn('status',[3,4])
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $orders_dayInMonth = $orders_dayInMonth->pluck("don_trong_thang")->toArray();
        // dd($orders_dayInMonth);
        $total_dayInMonth = DB::table('orders_out')
        ->select(DB::raw('sum(total) tien_trong_thang'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        ->whereIn('status',[3,4])
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $total_dayInMonth = $total_dayInMonth->pluck("tien_trong_thang")->toArray();

        // Lấy tổng đơn hoàn thành các ngày trong tuần statuc = 3 hoàn thành
        $orders_complete = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_ht_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 3)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_complete = $orders_complete->pluck("don_ht_trong_thang")->toArray();

        // Lấy tổng tiền hoàn thành
        $total_complete = DB::table('orders_out')
        ->select(DB::raw('sum(total) tien_ht_trong_thang'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
        ->where('status', '=', 3)
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $total_complete = $total_complete->pluck("tien_ht_trong_thang")->toArray();

        $orders_fail = [];
        for($i =0; $i<count($daysInMonth);$i++)
        {   
            if(!empty($orders_dayInMonth) && !empty($orders_complete))
            {
                $fail = $orders_dayInMonth[$i] - $orders_complete[$i];
                array_push($orders_fail,$fail);
            }
            
        }

        $total_fail = [];
        for($i =0; $i<count($daysInMonth);$i++)
        {   
            if(!empty($total_dayInMonth) && !empty($total_complete))
            {
                $fail = $total_dayInMonth[$i] - $total_complete[$i];
                array_push($total_fail,$fail);
            }
        }


        $daysInMonth = json_encode($daysInMonth);

        $total_dayInMonth = json_encode($total_dayInMonth);
        $orders_dayInMonth = json_encode($orders_dayInMonth);

        $orders_complete = json_encode($orders_complete);
        $total_complete = json_encode($total_complete);

        $orders_fail = json_encode($orders_fail);
        $total_fail = json_encode($total_fail);
        return view('Dashboard.statistic',compact('daysInMonth','orders_dayInMonth','total_dayInMonth','orders_complete','orders_fail','total_complete','total_fail'));
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
