<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.profile.add');
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
            'avatar'=>'required|image',
            'facebook'=>'required|min:5|max:200',
            'youtube'=>'required|min:5|max:200',
            'about'=>'required|min:5|max:300',
        ]);

        $count_prof = Profile::where('user_id',\Auth::id())->get();

        if(count($count_prof) == 0){
            $file = $request['avatar'];
            $image_name = time().$file->getClientOriginalName();
            $file->move('app/uploade_img/',$image_name);
            $data['user_id'] = \Auth::id();
            $data['avatar'] = 'app/uploade_img/'.$image_name;

            Profile::create($data);

            return redirect('profile/'.\Auth::id())->with('success','your profile filed successfuly');
        }else{
            return redirect()->back()->with('info','your profile is already exist');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $profile_id = $user->profile->id;
        $data = Profile::find($profile_id);
        return view('app.profile.index',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $profile_id = $user->profile->id;
        $data = Profile::find($profile_id);
        return view('app.profile.edit',compact('data'));
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
            'facebook'=>'required|min:5|max:200',
            'youtube'=>'required|min:5|max:200',
            'about'=>'required|min:5|max:300',
        ]);

        $pro = Profile::find($id);

        if($request->avatar  != null){
            $file = $request['avatar'];
            $image_name = time().$file->getClientOriginalName();
            $file->move('app/uploade_img/',$image_name);
            $pro['avatar'] = 'app/uploade_img/'.$image_name;
        }else{
            $pro['avatar'] = $pro['avatar'];
        }

        $pro['facebook'] = $data['facebook'];
        $pro['youtube'] = $data['youtube'];
        $pro['about'] = $data['about'];
        $pro->save();

        return redirect('profile/'.\Auth::id())->with('success','your profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
