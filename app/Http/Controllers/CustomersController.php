<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use App\Http\Requests\CustomersRequest;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hienThi = 1;
        $customers = Customers::all();
        return view('Customers.list',compact('customers','hienThi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomersRequest $request)
    {
        $customer = new Customers();
        $phone_number = $request->input('phone_number','0');
        if($phone_number != 0)
        {
            $flag = $customer::where('phone_number',$phone_number)->exists();
            if(!$flag)
            {
                $customer->last_name = $request->input('last_name');
                $customer->first_name = $request->input('first_name');
                $customer->phone_number = $phone_number;
                $customer->save();
                return redirect()->route('customers-list');
            }
        }
        return redirect()->route('customers-add');
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
        $customer = Customers::find($id);
        return view('Customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomersRequest $request, $id)
    {
        $customer = Customers::find($id);
        $phone_number = $request->input('phone_number','0');
        if($phone_number != 0)
        {
            $flag = $customer::where('phone_number',$phone_number)->exists();
            if(!$flag)
            {
                $customer->last_name = $request->input('last_name');
                $customer->first_name = $request->input('first_name');
                $customer->phone_number = $phone_number;
                $customer->save();
                return redirect()->route('customers-list');
            }
        }
        return redirect()->route('customers-add');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return redirect()->route('customers-list');
    }

    public function trash()
    {
        $hienThi = 2;
        $customers = Customers::onlyTrashed()->get();
        return view('Customers.list',compact('hienThi','customers'));
        
    }

    public function restore($id)
    {
        $customer = Customers::onlyTrashed()->find($id);
        $customer->restore();
        return redirect()->route('customers-list');
    }
}
