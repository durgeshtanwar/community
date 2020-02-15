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
            'name'=> $request['name'],
            'email'=>$request['email'],
            'mobile'=>$request['mobile'],
            'family_cast'=>$request['family_cast'],
            'family_head'=>$request['family_head'],
            'gotra'=>$kuldevi[0],
            'kuldevi'=>$kuldevi[1],
            'active'=>'active',
            'family_id'=>$familyId,
            'password'=>Hash::make($request['password']),
            'usertype'=>'member',
            'madeFor'=>'self',
            'code'=>rand(pow(10, 5-1), pow(10, 5)-1),
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
    public function update()
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
        $user = User::findOrFail($id);

        $this->authorize('isAdmin');
        $this->authorize('isFamily');
        $user->delete();
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
}
