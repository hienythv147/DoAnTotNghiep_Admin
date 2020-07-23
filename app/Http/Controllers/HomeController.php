<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use Session;

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
        return view('master-page');
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
        // if( count($categories->toArray()) >= 3) {
        //     $categories = $categories->random(3);
        // }
        return view('home.index', compact('products','productsNew', 'productsBest', 'categories'));
    }

    public function viewCart(Request $request) {
        $cart = $request->session()->get('cart', null);
        $subTotal = 0;
        if(!empty($cart)) {
            foreach($cart as $item) {
                $subTotal += $item['price'];
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
}
