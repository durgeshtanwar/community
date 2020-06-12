<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Family;
use App\UserDetail;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
        return User::latest()->paginate(20);
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
            'mobile'=>'required|string|max:10|unique:users',
            'password'=>'required|string|min:8',
            'gender'=>'required',
            'family_cast'=>'required|string|min:4',
            'family_head'=>'required|string|max:191',
            'gotra'=>'required',
            
            //'code'=>'string|max:191|exists:users,code'
        ]);
        $family = New Family();
        $family->family_cast = $request['family_cast'];
        $family->gotra = $request['gotra'];
        $family->family_head = $request['family_head'];
        $family->save();
        $familyId = $family->id;
   
        $kuldevi = explode('|',$request['gotra'],2);
        //return ['message'=>'I have your data'];
         User::create([
            'username'=>'SHA'.rand(pow(10, 6-1), pow(10, 6)-1),
            'name' => $data['name'],
            'email' => $data['email'],
            'gender'=>$data['gender'],
            'password' => Hash::make($data['password']),
            'mobile'=>$data['mobile'],
            'family_cast'=>$data['family_cast'],
            'family_head'=>$data['family_head'],
            'gotra'=>$kuldevi[0],
            'kuldevi'=>$kuldevi[1],
            'pur'=>$data['pur'],
            'active'=>'active',
            'usertype'=>'family',
            'family_id'=>$familyId,
            'code'=>rand(pow(10, 5-1), pow(10, 5)-1),
            'madeFor'=>'self'
        ]);
        return 1;
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
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email'=>'required|string|email|max:255',
            'mobile'=>'required|string|max:10',
            'password'=>'required|sometimes|string|min:8',
            'gender'=>'required',
            'family_cast'=>'required|string|min:4',
            'family_head'=>'required|string|max:191',
            'gotra'=>'required|sometimes|string',
            
            //'code'=>'string|max:191|exists:users,code'
        ]);

        $user =  User::findOrFail($id);
        $user->update($request->all());

        DB::table('users_details')
            ->where('user_id',$id)
            ->update(['name'=> $request['name'],
                   'gender'=>$request['gender'],
                   'email'=>$request['email'],
                   'mobile'=>$request['mobile']     
                ]);
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
        $user = User::findOrFail($id);

        //$this->authorize('isAdmin');
        
        $this->authorize('isFamily');
        $user->delete();
       

        DB::table('users_details')->where('user_id','LIKE',$id)->delete();
        return ['message'=>"user deleted"];
  }

    public function updatePhoto(Request $request){

        $userid = Auth::User()->id;
        $this->validate($request,[
            'image'=>'required|sometimes',
        ]);
        if($request->photo){
              $imageName = preg_match_all('/data\:image\/([a-zA-Z]+)\;base64/',$request->photo,$matched);
              $ext = isset($matched[1][0]) ? $matched[1][0] : false;
              $imageName = sha1(time()) . '.' .$ext; 
              $img = \Image::make($request->photo);
              $img->resize(300, null, function ($constraint) {
                  $constraint->aspectRatio();
              });
              $img->save(public_path('images/profile/').$imageName);
            //   $user = new User;
            //   $user->image = $imageName;
        DB::table('users')
            ->where('id', $userid)
            ->update(['image' => $imageName]);
       }

}
    public function updateUserType(Request $request, $id){
        $event = User::findOrFail($id);
        $this->validate($request,[
           'usertype'=>'required' 
        ]);
        $event->update($request->all()); 
        return ['message'=> 'user updated successfully'];  
    }

    public function updateUser(Request $request){

        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email'=>'required|string|email|max:255|',
            'mobile'=>'required|string|max:10|unique:users',
            'password'=>'required|sometimes|string|min:8',
            'gender'=>'required',
            'family_cast'=>'required|string|min:4',
            'family_head'=>'required|string|max:191',
            'gotra'=>'required',
            
            //'code'=>'string|max:191|exists:users,code'
        ]);

        $user =  User::findOrFail($id);
        $user->update($request->all());
    }

    // Function to get users after searchin
    public function getusers(){

        $name =  $_GET['name'];
        $gotra =  $_GET['gotra'];
        $city =  $_GET['city'];
        $username = $_GET['username'];
        $state = $_GET['state'];
        $city = $_GET['city'];
        $pur =  $_GET['pur'];
    
        $query = DB::table('users')
                ->join('users_details','users.id','=','users_details.user_id')
                ->select('users.*','users_details.state','users_details.city')
                ->where('users.name','like',"%$name%")
                ->where('users.username','like',"%$username%")
                ->where('users.gotra','like',"%$gotra%")
                ->where('users.pur','like',"%$pur%")
                ->where('users_details.state','like',"%$state%")
                ->where('users_details.city','like',"%$city%")
                ->paginate(10);
        return $query;
    }
}
