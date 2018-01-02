<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('*')->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request,[
            'name'=>'required|string|min:4|max:50',
            'email'=>'required|unique:users',
            'password'=>'required|string|min:6|confirmed'
        ]);
        $data['admin'] = 0;
        User::create($data);
        return redirect('users')->with('success','use added successully');

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
        $data = User::findOrFail($id);
        return view('admin.users.edit',compact('data'));
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
        $data = $request->all();
        $this->validate($request,[
            'name'=>'required|min:2|max:50',
            'email'=>'required|email'
        ]);

        $user = User::findOrFail($id);
        $user->email = $data['email'];
        $user->name = $data['name'];

        if($data['password'] == null){
            $user->password = bcrypt($user->password);
        }else{
            $user->password = bcrypt($data['password']);
        }

        $user->save();
        return redirect('users')->with('success','Your info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success','user removed successfully');
    }

   public function make_admin($id){
       $user = User::find($id);
       $user->admin = 1;
       $user->save();
       return redirect()->back()->with('success','Permision added successfully');
   }
    public function remove_admin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        return redirect()->back()->with('success','Permision Removed successfully');
    }

    public function admin_logout(){
        \Auth::logout();
        return redirect('login');
    }

}
