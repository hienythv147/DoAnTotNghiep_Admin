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
        $this->validate($request,
        [
            'name' => 'unique:ingredients'
        ],
        [
            'name.unique' => 'Nguyên liệu đã tồn tại.'
        ]);
        $ingredient->name = $request->name;
        $ingredient->ingredient_unit = $request->ingredient_unit;
        $ingredient->amount_stock = $request->amount_stock; 
        $ingredient->save();
        return back()->with('message_success','Thêm thành công.');
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
    public function update(IngredientsRequest $request, $id)
    {
        $ingredient = Ingredients::find($id);
        if($ingredient->name == $request->name)
        {
            $ingredient->ingredient_unit = $request->ingredient_unit;
            $ingredient->amount_stock = $request->amount_stock; 
            $result = $ingredient->save();
            if($result)
            return back()->with('message_success','Sửa thành công.');
        }
        else
        {
            $this->validate($request,
            [
                'name' => 'unique:ingredients'
            ],
            [
                'name.unique' => 'Nguyên liệu đã tồn tại.'
            ]);
            $ingredient->ingredient_unit = $request->ingredient_unit;
            $ingredient->amount_stock = $request->amount_stock; 
            $result = $ingredient->save();
            if($result)
            return back()->with('message_success','Sửa thành công.');
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
