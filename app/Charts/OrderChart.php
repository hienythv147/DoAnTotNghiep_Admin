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
        // dd($values);
        return Chartisan::build()
            ->labels($keys)
            ->dataset('Tổng tiền', $values);
            
    }
}