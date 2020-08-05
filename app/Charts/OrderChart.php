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
use Carbon\Carbon;

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
        
        // Tổng đơn các ngày trong tuần
        $currentDay = Carbon::now();
        $startDay = $currentDay->startOfWeek()->format('Y-m-d');
        $endDay = $currentDay->endOfWeek()->addDay()->format('Y-m-d');
        $orders_dayOfWeek = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_trong_ngay'))
                        ->whereBetween('created_at',array($startDay.'%', $endDay.'%'))
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_dayOfWeek = $orders_dayOfWeek->pluck("don_trong_ngay")->toArray();
        // Lấy tổng đơn hoàn thành các ngày trong tuần
        $orders_complete = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_ht_trong_ngay'))
                        ->whereBetween('created_at',array($startDay.'%', $endDay.'%'))
                        ->where('status', '=', 1)
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_complete = $orders_complete->pluck("don_ht_trong_ngay")->toArray();

        $orders_queue = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_cho_trong_ngay'))
                        ->where('status', '=', 0)
                        ->groupBy('created_at')
                        ->get();
        $orders_queue = $orders_queue->pluck("don_cho_trong_ngay")->toArray();

        $chart = Chartisan::build()
        ->labels(['Thứ hai', 'Thứ ba ', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ nhật'])
        ->dataset('Tổng đơn', $orders_dayOfWeek)
        // ->dataset('Tổng đơn chờ xác nhận', $orders_complete)
        ->dataset('Tổng đơn hoàn thành', $orders_complete);
        return $chart;
            
    }
}