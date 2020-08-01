<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Roles;

class RolesController extends Controller
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
        $roles = Roles::all();
        return view('Roles.list',compact('roles','hienThi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Roles.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $newRoles = new Roles();
        $this->validate($request,
        [
            'name' => 'unique:roles'
        ],
        [
            'name.unique' => 'Loại nhân viên đã tồn tại.'
        ]);
        $newRoles->name  = $request->name;
        $newRoles->save();
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
        $role = Roles::find($id);
        return view('Roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, $id)
    {
        $role = Roles::find($id);
        if($role->name == $request->name)
        {
            $role->save();
            return back()->with('message_success','Chưa thay đổi dữ liệu nhưng ok thành công :)).');
        }
        else
        {
            $this->validate($request,
            [
                'name' => 'unique:roles'
            ],
            [
                'name.unique' => 'Loại nhân viên đã tồn tại.'
            ]);
            $role->name  = $request->name;
            $role->save();
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
        $roles = Roles::find($id);      
        $roles->delete();
        return redirect()->back();
    }

    public function trash()
    {
        $hienThi = 2;
        $roles = Roles::onlyTrashed()->get();
        return view('Roles.list',compact('roles','hienThi'));
    }

    public function restore($id)
    {
        $roles = Roles::onlyTrashed()->find($id);
        $roles->restore();
        return redirect()->route('roles-list');
    }
}
