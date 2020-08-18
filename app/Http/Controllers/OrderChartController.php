<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\Orders_out;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Categories;
use App\Products;
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
        if($request->post() && !($request->startDay == '' && $request->endDay == ''))
        {
            $this->validate($request,
            [
                'startDay' => ['date'],
                'endDay' => ['date']
            ],
            [
                // 'startDay.required' => 'Ngày bắt đầu không được bỏ trống.',
                // 'endDay.required' => 'Ngày kết thúc không được bỏ trống.',
                'startDay.date' => 'Ngày bắt đầu không hợp lệ.',
                'endDay.date' => 'Ngày kết thúc không hợp lệ'
            ]);
            $startDay = $request->startDay;
            $endDay = $request->endDay;
            if(strtotime($startDay)>strtotime($endDay))
            {
                return back()->with('message_error','Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu.');
            }
            if($request->product_id)
            {
                // SELECT date(orders_out.created_at) ngay, count(*) don FROM `orders_out`, `orders_out_detail` WHERE `orders_out`.`id` = `orders_out_detail`.`order_out_id` AND (`orders_out`.`status` = 3 OR `orders_out`.`status` = 4) and product_id = 1 GROUP BY date(orders_out.created_at)
                $product_id = $request->product_id;
            }
        }
        else
        {
            $currentDay = Carbon::now();
            $startDay = $currentDay->startOfMonth()->format('Y-m-d');
            $endDay = $currentDay->endOfMonth()->format('Y-m-d');
        }

        $tong = Orders_out::select(DB::raw('Date(created_at) ngay,sum(total) tien, count(*) don'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        ->whereIn('status',[3,4])
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $ngay_tong = $tong->pluck("ngay")->toArray();
        $don_tong = $tong->pluck("don")->toArray();
        $tien_tong = $tong->pluck("tien")->toArray();
        // dd($ngay_tong,$don_tong,$tien_tong);   
    
        $hoan_thanh = Orders_out::select(DB::raw('Date(created_at) ngay,sum(total) tien, count(*) don'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        ->where('status','=',3)
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $ngay_ht = $hoan_thanh->pluck("ngay")->toArray();
        $don_ht = $hoan_thanh->pluck("don")->toArray();
        $tien_ht = $hoan_thanh->pluck("tien")->toArray();
        // dd($ngay_ht,$don_ht,$tien_ht);   

        $don_ht_2 = [];
        for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
        {
            if($i <= count($don_ht))
            {
                if($ngay_tong[$i] == $ngay_ht[$count])
                {
                    array_push($don_ht_2,$don_ht[$count]);
                    $count++;
                }
                else
                {
                    array_push($don_ht_2,0);
                }
            }
        }
        $tien_ht_2 = [];
        for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
        {
            if($i <= count($tien_ht))
            {
                if($ngay_tong[$i] == $ngay_ht[$count])
                {
                    array_push($tien_ht_2,$tien_ht[$count]);
                    $count++;
                }
                else
                {
                    array_push($tien_ht_2,0);
                }
            }
        }
        $don_huy = [];
        $tien_huy = [];
        for($i=0; $i < count($ngay_tong) ; $i++)
        {
            $so_luong = $don_tong[$i] - $don_ht_2[$i];
            $tien = $tien_tong[$i] - $tien_ht_2[$i];
            array_push($don_huy,$so_luong);
            array_push($tien_huy,$tien);
        }
        $ngay_tong = json_encode($ngay_tong);
        $don_tong = json_encode($don_tong);
        $tien_tong = json_encode($tien_tong);

        $don_ht_2 = json_encode($don_ht_2);
        $tien_ht_2 = json_encode($tien_ht_2);
        $don_huy = json_encode($don_huy);
        $tien_huy = json_encode($tien_huy);
        $products = Products::all();
        return view('Dashboard.statistic',compact('categories','ngay_tong','don_tong','tien_tong','don_ht_2','tien_ht_2','don_huy','tien_huy'));
    }
}
