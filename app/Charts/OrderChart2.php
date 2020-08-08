<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

use App\Orders_out;
use App\Orders_in;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class OrderChart2 extends BaseChart
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
    public ?string $routeName = 'order_chart2';

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
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $currentDay = Carbon::now();
        $startDay = $currentDay->startOfMonth()->format('Y-m-d');
        $endDay = $currentDay->endOfMonth()->format('Y-m-d');
        
        $daysInMonth = DB::table('orders_out')
        ->select(DB::raw('Date(created_at) ngay'))->distinct()
        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))
        ->orderBy('ngay', 'asc')
        ->get();
        $daysInMonth = $daysInMonth->pluck("ngay")->toArray();

        $total_by_day = DB::table('orders_out')
        ->select(DB::raw("sum(total) tien_trong_ngay"))
        ->where('status', '=', 1)
        ->groupBy('created_at')
        ->get();
        $total_by_day = $total_by_day->pluck("tien_trong_ngay")->toArray();

        
        return Chartisan::build()
        ->labels($daysInMonth)
        ->dataset('Tổng tiền', $total_by_day);
    }
}