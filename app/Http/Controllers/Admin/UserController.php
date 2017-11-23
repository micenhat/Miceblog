<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\admin\admin;
use App\Model\admin\role;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $users = admin::all();
        return view('admin.user.show',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::user()->can('users.create')){
            $roles = role::all();
            return view('admin.user.create',compact('roles'));
            }
      return redirect(route('admin.home'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:admins',
          'phone' => 'required|numeric',
          'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password']= bcrypt($request->password);
        $user = admin::Create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'));
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
        if(auth::user()->can('users.update')){
            $user = admin::find($id);
            $roles = role::all();
            return view('admin.user.edit',compact('user','roles'));
            }
        return redirect(route('admin.home'));
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
      $this->validate($request,[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'phone' => 'required|numeric',
        // 'password' => 'required|string|min:6|confirmed',
      ]);
      $request->status? : $request['status']=0;
      $user = admin::where('id',$id)->update($request->except('_token','_method','role'));
      admin::find($id)->roles()->sync($request->role);
      return redirect(route('user.index'))->with('message','User is update susscessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        admin::where('id',$id)->delete();
        return redirect()->back()->with('message','User is deleted susscessfully');
        
    }
      
}
