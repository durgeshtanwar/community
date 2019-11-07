<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth:api');
        
    }
    /**
     * Display a  listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8',
            'username'=>'required|string|unique:users|max:191',
            'family_cast'=>'required|string|min:4',
            'family_head'=>'required|string|max:191',
            'gotra'=>'string|max:191',
            //'code'=>'string|max:191|exists:users,code'
        ]);
        //return ['message'=>'I have your data'];
        return User::create([
            'name'=> $request['name'],
            'email'=>$request['email'],
            'username'=>$request['username'],
            'family_cast'=>$request['family_cast'],
            'family_head'=>$request['family_head'],
            'gotra'=>$request['gotra'],
            'password'=>Hash::make($request['password']),
            'usertype'=>$request['usertype'],
            'code'=>rand(pow(10, 5-1), pow(10, 5)-1),
        ]);
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
