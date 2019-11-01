<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserDetail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   return auth('api')->user();
  // return $user = Auth::user();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'name'=>'required|string|max:191',
           'relation'=>'required|string|max:191',
           'gender'=>'required|string|max:191',
           'dob'=>'required|string|max:191',
           'marriage_status'=>'required|string|max:191',
           'email'=>'required|string|max:255|unique:users',
           'mobile'=>'required|string|max:10',
           'father_name'=>'required|string|max:191',
           'mother_name'=>'required|string|max:191',
           'address'=>'required|string|max:191',
           'city'=>'required|string|max:191',
           'state'=>'required|string|max:191',
           'occupation'=>'required|string|max:191',
           'department'=>'string|max:191',
           'post_graduate_degree'=>'string|max:191',
           'post_graduate_university'=>'string|max:191',
           'post_graduate_university_city'=>'string|max:191',
           'post_graduate_university_state'=>'string|max:191',
           'post_graduate_percentage'=>'string|max:191',
           'post_graduate_year_of_passing'=>'string|max:191',
           'graduate_degree'=>'string|max:191',
           'graduate_university'=>'string|max:191',
           'graduate_university_city'=>'string|max:191',
           'graduate_university_state'=>'string|max:191',
           'graduate_percentage'=>'string|max:191',
           'graduate_year_of_passing'=>'string|max:191',
           'class_12_board'=>'string|max:191',
           'class_12_school_name'=>'string|max:191',
           'class_12_percentage'=>'string|max:191',
           'class_12_year_of_passing'=>'string|max:191',
           'class_12_city'=>'string|max:191',
           'class_10_board'=>'string|max:191',
           'class_10_school_name'=>'string|max:191',
           'class_10_percentage'=>'string|max:191',
           'class_10_year_of_passing'=>'string|max:191',
           'class_10_city'=>'string|max:191',
           'password'=>'required|string|min:8',
           'username'=>'required|string|unique:users|max:191',


       ]);
       $userid = Auth::user();

    $user = new User();
    $user->email = $request->email;
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password =Hash::make($request['password']);
    $user->gotra= Auth::user()->gotra;
    $user->save();
     //   dd(auth('api')->user());

       
        // return ['message'=>'I have your data'];
       // return $request->all();
    //    $userDetail = new UserDetail();
    //    $userDetail->name = $request->
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
        //
    }
}
