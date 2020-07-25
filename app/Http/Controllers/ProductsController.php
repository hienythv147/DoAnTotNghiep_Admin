<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Products;
use App\Categories;

class ProductsController extends Controller
{
    // Xác thực
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hienThi = 1;
        //Lấy ds loại sản phẩm
        $categories = Categories::all();
        //Kiểm tra category_id đối chiếu với mã loại sản phẩm (khóa chính)
        $products = Products::WhereIn('category_id',$categories->modelKeys())->get();
        return view('Products.list',compact('products','hienThi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('Products.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $newProduct = new Products();
        $getProductImage = '';
        $flag = $newProduct::where('name',$request->product_name)->exists();
        if(!$flag)
        {
            // $newProduct->name = $request->product_name;
            // $newProduct->category_id = $request->category_id;
            // $newProduct->price = $request->product_price;    
            //     //Lưu hình ảnh vào thư mục public/upload/product_image
            //     // $product_image = $request->file('product_image');
            //     // $getProductImage = time().'_'.$product_image->getClientOriginalName();
            //     // $destinationPath = public_path('upload/product_image');
            //     // $product_image->move($destinationPath,$getProductImage);
            //     $newProduct->save();
            //     return redirect()->route('products-list');
        }
        else
        {
            return redirect()->route('products-add');
        }
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
        $product = Products::find($id);
        $product->delete();
        return back();
    }

    public function trash()
    {
        $hienThi = 2;
        $products = Products::onlyTrashed()->get();
        return view('Products.list',compact('hienThi','products'));
    }

    public function restore($id)
    {
        $product = Products::onlyTrashed()->find($id);
        $product->restore();
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_user()
    {
        $categories = Categories::all();
        $products = Products::paginate(9);
        return view('home/products', compact('products', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::all();
        $products = Products::where('category_id', $id)->paginate(9);
        return view('home/products', compact('products', 'categories'));
    }

    public function showProductDetail($id) {
        $productDetail = Products::find($id);
        $products = Products::where('category_id', $productDetail->category_id)->get();
        return view('home.product_detail', compact('productDetail', 'products'));
    }
}
