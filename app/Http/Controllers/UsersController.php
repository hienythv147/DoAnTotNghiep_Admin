<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Roles;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hienThi = 1;
        $roles = Roles::all();
        $users = User::WhereIn('role_id',$roles->modelKeys())->get();
        return view('Users.list',compact('users','hienThi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('Users.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $newUser = new User();
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->first_name = $request->first_name;
        $newUser->last_name = $request->last_name;
        $newUser->phone_number = $request->phone_number;
        $newUser->role_id = $request->role_id;
        $newUser->address = $request->address;
        $newUser->save();
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
        $roles = Roles::all();
        $user = User::find($id);
        return view('Users.edit',compact('user','roles'));
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
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('users-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users-list');
    }

    public function trash()
    {
        $hienThi = 2;
        $users = User::onlyTrashed()->get();
        return view ('Users.list',compact('hienThi','users'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return redirect()->route('users-list');
    }
}
