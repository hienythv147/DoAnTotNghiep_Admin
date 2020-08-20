<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderChart;
use App\Orders_out;
use App\Orders_out_detail;
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
        if(!($request->startDay == null && $request->endDay == null))
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
        }
        else{
            $currentDay = Carbon::now();
            $startDay = $currentDay->startOfMonth()->format('Y-m-d');
            $endDay = $currentDay->endOfMonth()->format('Y-m-d');
        }
        if($request->product_id)
        {
            $this->validate($request,
            [
                'product_id' => 'required | max: 255'
            ],
            [
                'product_id.required' => 'Mã sp không hợp lệ.',
                'product_id.max' => 'Mã sp không hợp lệ.'
            ]);
            $product_id = $request->product_id;
            $products_id = Products::all('id');
            $products_id = $products_id->pluck('id')->toArray();
            $result = false;
            for($i = 0; $i < count($products_id); $i++)
            {
                if($products_id[$i] == $product_id)
                {
                    $result = true;break;
                }
                    
            }
            if($result)
            {
                // SELECT date(orders_out.created_at) ngay,sum(orders_out_detail.price) tien, count(*) don from orders_out, orders_out_detail WHERE orders_out.id = orders_out_detail.order_out_id AND (orders_out.status = 3 OR orders_out.status = 4) AND orders_out_detail.product_id = 1 GROUP BY date(orders_out.created_at)
                $tong = Orders_out::join('orders_out_detail','orders_out.id','=','orders_out_detail.order_out_id')
                ->select(DB::raw('Date(orders_out.created_at) ngay,sum(orders_out_detail.price) tien, count(*) don'))
                ->whereBetween(DB::raw('Date(orders_out.created_at)'),array($startDay, $endDay))
                ->whereIn('orders_out.status',[3,4])
                ->where('orders_out_detail.product_id', '=', $product_id)
                ->groupBy(DB::raw('Date(orders_out.created_at)'))
                ->get();
                $ngay_tong = $tong->pluck("ngay")->toArray();
                $don_tong = $tong->pluck("don")->toArray();
                $tien_tong = $tong->pluck("tien")->toArray();
                // dd($ngay_tong,$don_tong);
                $hoan_thanh = Orders_out::join('orders_out_detail','orders_out.id','=','orders_out_detail.order_out_id')
                ->select(DB::raw('Date(orders_out.created_at) ngay,sum(orders_out_detail.price) tien, count(*) don'))
                ->whereBetween(DB::raw('Date(orders_out.created_at)'),array($startDay, $endDay))
                ->where('orders_out.status','=', 3)
                ->where('orders_out_detail.product_id', '=', $product_id)
                ->groupBy(DB::raw('Date(orders_out.created_at)'))
                ->get();
                $ngay_ht = $hoan_thanh->pluck("ngay")->toArray();
                $don_ht = $hoan_thanh->pluck("don")->toArray();
                $tien_ht = $hoan_thanh->pluck("tien")->toArray();
                // dd($ngay_tong,$ngay_ht,$don_tong,$don_ht);
                $that_bai = Orders_out::join('orders_out_detail','orders_out.id','=','orders_out_detail.order_out_id')
                ->select(DB::raw('Date(orders_out.created_at) ngay,sum(orders_out_detail.price) tien, count(*) don'))
                ->whereBetween(DB::raw('Date(orders_out.created_at)'),array($startDay, $endDay))
                ->where('orders_out.status','=', 3)
                ->where('orders_out_detail.product_id', '=', $product_id)
                ->groupBy(DB::raw('Date(orders_out.created_at)'))
                ->get();
                $ngay_tb = $that_bai->pluck("ngay")->toArray();
                $don_tb = $that_bai->pluck("don")->toArray();
                $tien_tb = $that_bai->pluck("tien")->toArray();
                // dd($ngay_tong,$ngay_tb,$ngay_ht,$don_tong,$don_tb);
                $don_ht_2 = [];
                $don_huy = [];
                $tien_ht_2 = [];
                $tien_huy = [];
                if(!empty($ngay_ht)){
                    for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
                    {
                        if($i < count($don_ht))
                        {
                            if($ngay_tong[$i] == $ngay_ht[$count])
                            {
                                // print_r($ngay_tong[$i]);
                                // echo 'và';
                                // print_r($ngay_ht[$count]);
                                // echo '</br>';
                                array_push($don_ht_2,$don_ht[$count]);
                                $count++;
                            }
                            else
                            {
                                array_push($don_ht_2,0);
                            }
                        }
                        else if($i >= count($don_ht))
                        {
                            // print_r($ngay_tong[$i]);
                            // echo 'và';
                            // print_r($ngay_ht[count($ngay_ht) - 1]);
                            // echo '</br>';
                            $vt_cuoi = count($ngay_ht) - 1;
                            if($vt_cuoi > 0) {
                                if($ngay_tong[$i] == $ngay_ht[$vt_cuoi])
                                {
                                    // print_r($ngay_tong[$i]);
                                    // echo 'và';
                                    // print_r($ngay_ht[$vt_cuoi]);
                                    // echo '</br>';
                                    array_push($don_ht_2,$don_ht[$vt_cuoi]);
                                }
                                else
                                {
                                    array_push($don_ht_2,0);
                                }
                            }
                        }
                    }
                    
                    // dd($ngay_tong,$ngay_ht,$don_tong,$don_ht_2);
                    for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
                    {
                        if($i < count($tien_ht))
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
                        else if($i >= count($tien_ht))
                        {
                            // print_r($ngay_tong[$i]);
                            // echo 'và';
                            // print_r($ngay_ht[count($ngay_ht) - 1]);
                            // echo '</br>';
                            $vt_cuoi = count($ngay_ht) - 1;
                            if($vt_cuoi > 0) {
                                if($ngay_tong[$i] == $ngay_ht[$vt_cuoi])
                                {
                                    array_push($tien_ht_2,$tien_ht[$vt_cuoi]);
                                }
                                else
                                {
                                    array_push($tien_ht_2,0);
                                }
                            }
                        }
                    }
                    for($i=0; $i < count($ngay_tong) ; $i++)
                    {
                        $so_luong = $don_tong[$i] - $don_ht_2[$i];
                        $tien = $tien_tong[$i] - $tien_ht_2[$i];
                        array_push($don_huy,$so_luong);
                        array_push($tien_huy,$tien);
                    }
                }
                elseif(!empty($ngay_tb))
                {   
                    for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
                    {
                        if($i < count($don_tb))
                        {
                            if($ngay_tong[$i] == $ngay_tb[$count])
                            {
                                array_push($don_huy,$don_tb[$count]);
                                $count++;
                            }
                            else
                            {
                                array_push($don_huy,0);
                            }
                        }
                        else if($i >= count($don_tb))
                        {
                            $vt_cuoi = count($ngay_tb) - 1;
                            if($vt_cuoi > 0) {
                                if($ngay_tong[$i] == $ngay_tb[$vt_cuoi])
                                {
                                    array_push($don_huy,$don_tb[$vt_cuoi]);
                                }
                                else
                                {
                                    array_push($don_huy,0);
                                }
                            }
                        }
                    }
                    for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
                    {
                        if($i < count($tien_tb))
                        {
                            if($ngay_tong[$i] == $ngay_tb[$count])
                            {
                                array_push($tien_huy,$tien_tb[$count]);
                                $count++;
                            }
                            else
                            {
                                array_push($tien_huy,0);
                            }
                        }
                        else if($i >= count($tien_tb))
                        {
                            $vt_cuoi = count($ngay_tb) - 1;
                            if($vt_cuoi > 0) {
                                if($ngay_tong[$i] == $ngay_tb[$vt_cuoi])
                                {
                                    array_push($tien_huy,$tien_tb[$vt_cuoi]);
                                }
                                else
                                {
                                    array_push($tien_huy,0);
                                }
                            }
                        }
                    }
                    for($i=0; $i < count($ngay_tong) ; $i++)
                    {
                        $so_luong = $don_tong[$i] - $don_huy[$i];
                        $tien = $tien_tong[$i] - $tien_huy[$i];
                        array_push($don_ht_2,$so_luong);
                        array_push($tien_ht_2,$tien);
                    }
                }
                elseif(empty($ngay_ht) && empty($ngay_tb))
                {
                    return back()->with('message_error','Sản phẩm chưa này chưa được sử dụng.');
                }
                // dd($ngay_tong,$ngay_ht,$don_tong,$don_ht_2,$don_huy);
                // dd($ngay_tong,$ngay_ht,$tien_tong,$tien_ht_2,$tien_huy);
                $ngay_tong = json_encode($ngay_tong);
                $don_tong = json_encode($don_tong);
                $tien_tong = json_encode($tien_tong);

                $don_ht_2 = json_encode($don_ht_2);
                $tien_ht_2 = json_encode($tien_ht_2);
                $don_huy = json_encode($don_huy);
                $tien_huy = json_encode($tien_huy);
                $products = Products::all();
                return view('Dashboard.statistic',compact('products','ngay_tong','don_tong','tien_tong','don_ht_2','tien_ht_2','don_huy','tien_huy'));
            }
            else
            {
                return back();
            }

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
        // dd($ngay_tong,$don_tong,$ngay_ht,$don_ht);
        $that_bai = Orders_out::select(DB::raw('Date(created_at) ngay,sum(total) tien, count(*) don'))
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
        ->where('status','=',4)
        ->groupBy(DB::raw('Date(created_at)'))
        ->get();
        $ngay_tb = $that_bai->pluck("ngay")->toArray();
        $don_tb = $that_bai->pluck("don")->toArray();
        $tien_tb = $that_bai->pluck("tien")->toArray();
        $don_ht_2 = [];
        $don_huy = [];
        $tien_ht_2 = [];
        $tien_huy = [];
        if(!empty($ngay_ht)){
            for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
            {
                if($i < count($don_ht))
                {
                    if($ngay_tong[$i] == $ngay_ht[$count])
                    {
                        // print_r($ngay_tong[$i]);
                        // echo 'và';
                        // print_r($ngay_ht[$count]);
                        // echo '</br>';
                        array_push($don_ht_2,$don_ht[$count]);
                        $count++;
                    }
                    else
                    {
                        array_push($don_ht_2,0);
                    }
                }
                else if($i >= count($don_ht))
                {
                    // print_r($ngay_tong[$i]);
                    // echo 'và';
                    // print_r($ngay_ht[count($ngay_ht) - 1]);
                    // echo '</br>';
                    $vt_cuoi = count($ngay_ht) - 1;
                    if($vt_cuoi > 0) {
                        if($ngay_tong[$i] == $ngay_ht[$vt_cuoi])
                        {
                            // print_r($ngay_tong[$i]);
                            // echo 'và';
                            // print_r($ngay_ht[$vt_cuoi]);
                            // echo '</br>';
                            array_push($don_ht_2,$don_ht[$vt_cuoi]);
                        }
                        else
                        {
                            array_push($don_ht_2,0);
                        }
                    }
                }
            }
            
            // dd($ngay_tong,$ngay_ht,$don_tong,$don_ht_2);
            for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
            {
                if($i < count($tien_ht))
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
                else if($i >= count($tien_ht))
                {
                    // print_r($ngay_tong[$i]);
                    // echo 'và';
                    // print_r($ngay_ht[count($ngay_ht) - 1]);
                    // echo '</br>';
                    $vt_cuoi = count($ngay_ht) - 1;
                    if($vt_cuoi > 0) {
                        if($ngay_tong[$i] == $ngay_ht[$vt_cuoi])
                        {
                            array_push($tien_ht_2,$tien_ht[$vt_cuoi]);
                        }
                        else
                        {
                            array_push($tien_ht_2,0);
                        }
                    }
                }
            }
            for($i=0; $i < count($ngay_tong) ; $i++)
            {
                $so_luong = $don_tong[$i] - $don_ht_2[$i];
                $tien = $tien_tong[$i] - $tien_ht_2[$i];
                array_push($don_huy,$so_luong);
                array_push($tien_huy,$tien);
            }
        }
        elseif(!empty($ngay_tb))
        {   
            $don_huy = [];
            for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
            {
                if($i < count($don_tb))
                {
                    if($ngay_tong[$i] == $ngay_tb[$count])
                    {
                        array_push($don_huy,$don_tb[$count]);
                        $count++;
                    }
                    else
                    {
                        array_push($don_huy,0);
                    }
                }
                else if($i >= count($don_tb))
                {
                    $vt_cuoi = count($ngay_tb) - 1;
                    if($vt_cuoi > 0) {
                        if($ngay_tong[$i] == $ngay_tb[$vt_cuoi])
                        {
                            array_push($don_huy,$don_tb[$vt_cuoi]);
                        }
                        else
                        {
                            array_push($don_huy,0);
                        }
                    }
                }
            }
            $tien_huy = [];
            for($i =0,$count = 0; $i < count($ngay_tong) ; $i++)
            {
                if($i < count($tien_tb))
                {
                    if($ngay_tong[$i] == $ngay_tb[$count])
                    {
                        array_push($tien_huy,$tien_tb[$count]);
                        $count++;
                    }
                    else
                    {
                        array_push($tien_huy,0);
                    }
                }
                else if($i >= count($tien_tb))
                {
                    $vt_cuoi = count($ngay_tb) - 1;
                    if($vt_cuoi > 0) {
                        if($ngay_tong[$i] == $ngay_tb[$vt_cuoi])
                        {
                            array_push($tien_huy,$tien_tb[$vt_cuoi]);
                        }
                        else
                        {
                            array_push($tien_huy,0);
                        }
                    }
                }
            }
            $don_ht_2 = [];
            $tien_ht_2 = [];
            for($i=0; $i < count($ngay_tong) ; $i++)
            {
                $so_luong = $don_tong[$i] - $don_huy[$i];
                $tien = $tien_tong[$i] - $tien_huy[$i];
                array_push($don_ht_2,$so_luong);
                array_push($tien_ht_2,$tien);
            }
        }
        elseif(empty($ngay_ht) && empty($ngay_tb))
        {
            return back()->with('message_error','Hiện chưa có dữ liệu để thống kê.');
        }
        // dd($ngay_tong,$ngay_ht,$don_tong,$don_ht_2,$don_huy);
        // dd($ngay_tong,$ngay_ht,$tien_tong,$tien_ht_2,$tien_huy);
        $ngay_tong = json_encode($ngay_tong);
        $don_tong = json_encode($don_tong);
        $tien_tong = json_encode($tien_tong);

        $don_ht_2 = json_encode($don_ht_2);
        $tien_ht_2 = json_encode($tien_ht_2);
        $don_huy = json_encode($don_huy);
        $tien_huy = json_encode($tien_huy);
        $products = Products::all();
        return view('Dashboard.statistic',compact('products','ngay_tong','don_tong','tien_tong','don_ht_2','tien_ht_2','don_huy','tien_huy'));
        
        
    }
}
