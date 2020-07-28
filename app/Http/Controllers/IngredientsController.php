<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredients;
use App\Http\Requests\IngredientsRequest;
class IngredientsController extends Controller
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
        $ingredients = Ingredients::all();
        return view('Ingredients.list',compact('ingredients','hienThi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ingredients.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientsRequest $request)
    {
        $ingredient = new Ingredients();
        $flag = $ingredient::where('name',$request->ingredient_name)->exists();
        if(!$flag)
        {
            $ingredient->name = $request->ingredient_name;
            $ingredient->ingredient_unit = $request->ingredient_unit;
            $ingredient->amount_stock = $request->amount_stock; 
            $ingredient->save();
            return back()->with('message_success','Thêm thành công!');
        }
        return back()->with('error_name','Nguyên liệu đã tồn tại!');
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
        $ingredient = Ingredients::find($id);
        return view('Ingredients.edit',compact('ingredient'));
        
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
        $ingredient = Ingredients::find($id);
        $ingredient_name = $request->ingredient_name;
        $flag = $ingredient::where('name',$ingredient_name)->exists();
        if(!$flag)  
        {
            $ingredient->name = $ingredient_name;
            $ingredient->ingredient_unit = $request->ingredient_unit;
            $ingredient->amount_stock = $request->amount_stock;
            $result = $ingredient->save();
            if($result)
            {
                session()->flash('message_success', 'Sửa thành công!');
                return redirect()->back();
            }
            else{
                session()->flash('message_error', 'Sửa thất bại!');
                return redirect()->back();
            }
            
        }
        else if($ingredient->name == $ingredient_name)
        {
            $ingredient->name = $ingredient_name;
            $ingredient->ingredient_unit = $request->ingredient_unit;
            $ingredient->amount_stock = $request->amount_stock;
            $result = $ingredient->save();
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
        return redirect()->route('ingredients-edit',['id' => $id])->with('error_name','Nguyên liệu đã tồn tại!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredients::find($id);
        $ingredient->delete();
        return redirect()->route('ingredients-list');
    }

    public function trash()
    {
        $hienThi = 2;
        $ingredients = Ingredients::onlyTrashed()->get();
        return view('Ingredients.list',compact('hienThi','ingredients'));
    }

    public function restore($id)
    {
        $roles = Ingredients::onlyTrashed()->find($id);
        $roles->restore();
        return redirect()->route('ingredients-list');
    }
}
