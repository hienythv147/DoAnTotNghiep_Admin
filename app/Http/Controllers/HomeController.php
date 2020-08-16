<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use Session;
use App\User;
use Carbon\Carbon;
use App\Orders_out;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index() {
        $currentDay = Carbon::now();
        $currentDay2 = Carbon::now();
        $day = $currentDay->toDateString();
        $month= $currentDay->month;
        // dd($day);
        // Ngày bắt đầu, kết thúc tuần này
        $startDay = $currentDay->startOfWeek()->format('Y-m-d');
        $endDay = $currentDay->endOfWeek()->format('Y-m-d');
        // dd($startDay,$endDay);
        
        // Thống kê trong này
        $orders_toDay = Orders_out::select(DB::raw('count(*) tong_don'))
                        ->where(DB::raw('Date(created_at)'),'=',$day)
                        ->get();
        $orders_toDay = $orders_toDay->pluck("tong_don")->toArray();
        // dd($orders_toDay);
        
        $total_toDay = Orders_out::select(DB::raw("sum(total) tien_trong_ngay"))
                        ->where(DB::raw('Date(created_at)'),'=',$day)     
                        ->where('status', '=', 3)
                        ->get();
        $total_toDay = $total_toDay->pluck("tien_trong_ngay")->toArray();
        // End thống kê trong ngày
        // Thống kê trong tuần
        $orders_toWeek = Orders_out::select(DB::raw('count(*) tong_don'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))     
                        ->where('status', '=', 3)
                        ->get();
        $orders_toWeek = $orders_toWeek->pluck("tong_don")->toArray();
        // dd($orders_toWeek);
        $total_toWeek = Orders_out::select(DB::raw("sum(total) tien_trong_tuan"))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))      
                        ->where('status', '=', 3)
                        ->get();
        $total_toWeek = $total_toWeek->pluck("tien_trong_tuan")->toArray();
        // end thống kê trong tuần
        // Thống kê trong tháng
        $startMonth = $currentDay->startOfMonth()->format('Y-m-d');
        $endMonth = $currentDay->endOfMonth()->format('Y-m-d');

        $total_toMonth = Orders_out::select(DB::raw("sum(total) tien_trong_thang"))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startMonth, $endMonth))      
                        ->where('status', '=', 3)
                        ->get();
        $total_toMonth = $total_toMonth->pluck("tien_trong_thang")->toArray();

        $orders_InMonth = DB::table('orders_out')
                        ->select(DB::raw('count(*) don_trong_thang'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startMonth.'%', $endMonth.'%'))
                        ->groupBy(DB::raw('Date(created_at)'))
                        ->get();
        $orders_InMonth = $orders_InMonth->pluck("don_trong_thang")->toArray();
        // End thống kê trong tháng
        // Thống kê tuần trước
        $startDay = $currentDay2->startOfWeek()->subDays(7)->format('Y-m-d');
        $endDay = $currentDay2->endOfWeek()->format('Y-m-d');
        
        // dd($startDay,$endDay);
        
        $newCustomer = User::select(DB::raw("count(*) kh_moi"))
                        ->where(DB::raw('Date(created_at)'),'=',$day)       
                        ->where('role_id', '=', 3)
                        ->get();
        $newCustomer = $newCustomer->pluck('kh_moi')->toArray();
        // dd($newCustomer);
        $newCustomerLastWeek = User::select(DB::raw("count(*) kh_moi"))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay, $endDay))
                        ->where('role_id', '=', 3)
                        ->get();
        $newCustomerLastWeek = $newCustomerLastWeek->pluck('kh_moi')->toArray();
        // dd($newCustomerLastWeek,$endDay);
        $orders_LastWeek = Orders_out::select(DB::raw('count(*) tong_don'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))     
                        ->where('status', '=', 3)
                        ->get();
        $orders_LastWeek = $orders_LastWeek->pluck("tong_don")->toArray();

        $total_LastWeek = Orders_out::select(DB::raw('sum(total) tien_tuan_truoc'))
                        ->whereBetween(DB::raw('Date(created_at)'),array($startDay.'%', $endDay.'%'))     
                        ->where('status', '=', 3)
                        ->get();
        $total_LastWeek = $total_LastWeek->pluck("tien_tuan_truoc")->toArray();
        // dd($total_LastWeek);
        // End thống kê tuần trước
        
        return view('layouts.dashboard',compact('day','month','newCustomer','newCustomerLastWeek','orders_toDay','orders_toWeek','orders_LastWeek','total_LastWeek','total_toDay','total_toWeek','total_toMonth','orders_InMonth'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_user()
    {
        $productsNew = Products::select()->orderBy('created_at', 'desc')->take(4)->get();
        $productsBest =  Products::all();
        $products = Products::all();
        if( count($products->toArray()) >= 10)
        {
            $products = $products->random(10);
        }
        if( count($productsBest->toArray()) >= 4) {
            $productsBest = $productsBest->random(4);
        }
        $categories = Categories::all();
        if( count($categories->toArray()) >= 3) {
            $categories = $categories->random(3);
        }
        return view('home.index', compact('products','productsNew', 'productsBest', 'categories'));
    }

    public function viewCart(Request $request) {
        $cart = $request->session()->get('cart', null);
        $subTotal = 0;
        if(!empty($cart)) {
            foreach($cart as $item) {
                $subTotal += $item['price'] * $item['amount'];
            }
        }
        return view('home.cart', compact('cart', 'subTotal'));
    }

    public function addToCart(Request $request) {
        if ($request->ajax()) {
            $spId = $request->id;
            $product = Products::find($spId);
            
            if($spId != null) {
                $productCart = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'amount' => 1,
                    'image' => $product->image,
                    'category_id' => $product->category_id,
                    'is_delete' => false
                ];
                $cart =$request->session()->get('cart', null);
                if($cart == null) {
                    $request->session()->push('cart', $productCart);
                } else {
                    $isExist = false;
                    for($i = 0; $i < count($cart); $i++) {
                        if($cart[$i]['id'] == $spId) {
                            $cart[$i]['amount']++;
                            $isExist = true;
                            $request->session()->put('cart', $cart);    
                            break;
                        }
                    }
                    if(!$isExist) {
                        $request->session()->push('cart', $productCart);
                    }
                }
                Session::save();
            } 
            $cart = $request->session()->get('cart', null);
            return response()->json($cart);
        }      
    }

    public function addToCartProductDetail(Request $request) {
        $spId = $request->id;
        $amount = (int)$request->amount;
        $product = Products::find($spId);
        
        if($spId != null) {
            $productCart = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'amount' => $amount,
                'image' => $product->image,
                'category_id' => $product->category_id,
                'is_delete' => false
            ];
            $cart =$request->session()->get('cart', null);
            if($cart == null) {
                $request->session()->push('cart', $productCart);
            } else {
                $isExist = false;
                for($i = 0; $i < count($cart); $i++) {
                    if($cart[$i]['id'] == $spId) {
                        $cart[$i]['amount'] += $amount;
                        $isExist = true;
                        $request->session()->put('cart', $cart);    
                        break;
                    }
                }
                if(!$isExist) {
                    $request->session()->push('cart', $productCart);
                }
            }
            Session::save();
            session()->flash('message_success', 'Thêm thành công');
            return redirect()->back();
        } 
    }

    public function removeProduct(Request $request) {
        $id = $request->id;
        $data = Session::get('cart', null);
        if($request->ajax()) {
            for($i = 0; $i < count($data); $i++) {
                if($data[$i]['id'] == $id) {
                    array_splice($data, $i, 1);
                }
            }
            Session::pull('cart', null);
            Session::put('cart', $data);
            return response()->json($data);
        }
    }

    public function liveSearch(Request $request) {
        if($request->ajax()) {
            $products = Products::all();
            $products = $products->toArray();
            return response()->json($products);
        }
    }

    public function updateAmount(Request $request) {
        if($request->ajax()) {
            $spId = $request->id;
            $cart =  Session::get('cart', null);
            for($i = 0; $i < count($cart); $i++) {
                if($cart[$i]['id'] == $spId) {
                    $cart[$i]['amount'] =  $request->query('amount');
                    $isExist = true;
                    $request->session()->put('cart', $cart);   
                    break;
                }
            }
            return response()->json(['status'=> 'OK']);
        }
    }
}
