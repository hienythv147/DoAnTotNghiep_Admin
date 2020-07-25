<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest;
use App\Categories;
use App\Products;
class CategoriesController extends Controller
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
        $categories = Categories::all();
        return view('Categories.list',compact('categories','hienThi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $category = new Categories();
        $flag = $category::where('name',$request->category_name)->exists();
        if(!$flag)
        {
            $category->name = $request->category_name;
            $category->category_type = $request->category_type;
            $result = $category->save();
            if($result)
            {
                session()->flash('message_success', 'Thêm thành công!');
                return redirect()->back();
            }
            else{
                session()->flash('message_error', 'Thêm thất bại');
                return redirect()->back();
            }
        }
        return redirect()->route('categories-add')->with('error','Loại sản phẩm đã tồn tại');
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
        $category = Categories::find($id);
        return view('Categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $editCate = Categories::find($id);
        $flag = $editCate::where('name',$request->category_name)->exists();
        if(!$flag)
        {
            $editCate->name = $request->category_name;
            $editCate->category_type = $request->category_type;
            $result = $editCate->save();
            if($result)
            {
                session()->flash('message_success', 'Sửa thành công!');
                return redirect()->back();
            }
            else{
                session()->flash('message_error', 'Sửa thất bại');
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->route('categories-edit',['id' => $id])->with('error','Loại sản phẩm đã tồn tại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function trash()
    {
        $hienThi = 2;
        $categories = Categories::onlyTrashed()->get();
        return view('Categories.list',compact('hienThi','categories'));
    }

    public function restore($id)
    {
        $category = Categories::onlyTrashed()->find($id);
        $category->restore();
        session()->flash('message_success', 'Khôi phục thành công!');
        return redirect()->back();
    }

    public function home_categories()
    {
        // $categories = Categories::all();
        $categories_drink = Categories::where('category_type',1)->get();
        $categories_food =Categories::where('category_type',2)->get();
        return view('home.categories',compact('categories_food','categories_drink'));
    }
}
