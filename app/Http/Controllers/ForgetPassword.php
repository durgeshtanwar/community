<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class ForgetPassword extends Controller
{
    //
   public function index(Request $request){
        $this->validate($request,[
        'username'=>'required|exists:users,username'
        ]);
        $random = rand(100000,999999);
        $password = Hash::make($random);
        $updatePassword = DB::table('users')
              ->where('username', $request['username'])
              ->update(['password' => $password]);
       
       $mobile = DB::table('users')->where('username', $request['username'] )->pluck('mobile');
          
        $api_key = '55EE848A1E208D';
      
        $contacts = $mobile[0];
        $from = 'SMSMSG';
        $sms_text = urlencode("Hello $request[username] your password is $random");
        $api_url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=9951&routeid=7&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
        file_get_contents($api_url);
        Session::flash('message', 'Please check your mobile you may have get the password'); 
        Session::flash('alert-class', 'alert-danger'); 
       
        return redirect()->back();
       
      }

      public function forgetusername(Request $request){
            $this->validate($request,[
                  'name'=>'required|exists:users,name',
                  'mobile'=>'required|exists:users,mobile'
            ]);
          $username = DB::table('users')
                       ->where('name','like',$request['name'])
                       ->where('mobile','like',$request['mobile'])
                       ->pluck('username');     
       
       $api_key = '55EE848A1E208D';
       $contacts = $request['mobile'];
       $from = 'SMSMSG';
       $sms_text = urlencode("Hello $request[name] your username is $username[0]");
       $api_url = "http://byebyesms.com/app/smsapi/index.php?key=".$api_key."&campaign=9951&routeid=7&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
       file_get_contents($api_url);
       Session::flash('message', 'Please check your mobile you will get your username'); 
       Session::flash('alert-class', 'alert-success'); 
        return redirect()->back();        

      }
}
