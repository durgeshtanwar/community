<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;


class FamilyController extends Controller
{

public function __construct()
{
  $this->middleware('auth:api');
}


public function familyusers()
{
       // $users = DB::table('users')->where('votes', '=', 100)->get();
        $matchthis = ['family_id'=>Auth::User()->family_id];
        return User::where($matchthis)->get();
    //return UserDetail::latest()->paginate(10);
}

public function getFamilyMembers(){
  
}
    
}
