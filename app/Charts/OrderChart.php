<?php

declare(strict_types = 1);
// Định dạng cho php không chuyển dữ liệu "3" thành kiểu in
// Ví dụ echo 5 + "3" thì php mặc định chuyển "3" -> 3(integer) cho nên giá trị sẽ bằng 8
// Với lệnh declare(strict_types = 1) sẽ ngăn điều đó sảy ra
// https://salferrarello.com/php-declare-strict_types-1/ hiểu hơn tại đây.
namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Orders_out;
use App\Orders_in;
use Illuminate\Support\Facades\DB;

class OrderChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    // public ?string $name = 'custom_chart_name';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'order_chart';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    // public ?string $prefix = 'some_prefix';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        
        $keys = Orders_out::all()->modelKeys();

        $values = Orders_out::pluck("total")->toArray() ;

        $days = Orders_out::pluck("created_at")->toArray() ;

        // Tổng đơn trong ngày
        $orders_day = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_trong_ngay'))
                        ->groupBy('created_at')
                        ->get();
        $orders_day = $orders_day->pluck("don_trong_ngay")->toArray();

        // Lấy tổng đơn hoàn thành trong ngày
        $orders_complete_day = DB::table('orders_out')
                     ->select(DB::raw('count(*) don_ht_trong_ngay'))
                     ->where('status', '=', 1)
                     ->groupBy('created_at')
                     ->get();
        $orders_complete_day = $orders_complete_day->pluck("don_ht_trong_ngay")->toArray();

        $orders_queue = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_cho_trong_ngay'))
                        ->where('status', '=', 0)
                        ->groupBy('created_at')
                        ->get();
        $orders_queue = $orders_queue->pluck("don_cho_trong_ngay")->toArray();
        // Lấy tổng tiền các đơn hoàn thành theo ngày
        // $total_by_day = DB::table('orders_out')
        //             ->select(DB::raw("sum(total) tien_trong_ngay"))
        //             ->where('status', '=', 1)
        //             ->groupBy('created_at')
        //             ->get();
        // $total_by_day = $total_by_day->pluck("tien_trong_ngay")->toArray();

        $chart = Chartisan::build()
        ->labels(['Ngày'])
        ->dataset('Tổng đơn trong ngày', $orders_day)
        ->dataset('Tổng đơn chờ xác nhận trong ngày', $orders_queue)
        ->dataset('Tổng đơn hoàn thành trong ngày', $orders_complete_day);
        return $chart;
            
    }
}