<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\UserDetail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserDetailsController extends Controller
{

public function __construct()
    {
 $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   return auth('api')->user();
  //return $user = Auth::user();
    }


    // this function stores the new member details into the database in two tables. one is users and other is userdetails
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $gotra = Auth::user()->gotra;
        
       $this->validate($request,[
           'name'=>'required|string|max:191',
           'relation'=>'required|string|max:191',
           'gender'=>'required|string|max:191',
           'dob'=>'required|string|max:191',
           'marriage_status'=>'required|string|max:191',
           'email'=>'string|max:255|nullable|',
           'mobile'=>'sometimes|string|max:20|nullable',
           'blood_group'=>'nullable|string',
           'address'=>'required|string|max:191',
           'city'=>'required|string|max:191',
           'state'=>'required|string|max:191',
           'occupation'=>'required|string|max:191',
           'password'=>'required|string|min:8',
        ]);
            $user_id = Auth::user();
            $user = new User();
            if($request->photo){
      // $name = time().'.'.explode('/'.explode(':',substr($request->photo,0,strpos($request->photo,':')))[1][1]);
        $imageName = preg_match_all('/data\:image\/([a-zA-Z]+)\;base64/',$request->photo,$matched);
        $ext = isset($matched[1][0]) ? $matched[1][0] : false;
        $imageName = sha1(time()) . '.' .$ext; 
        $img = \Image::make($request->photo);
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save(public_path('images/profile/').$imageName);
      $user->image = $imageName;
    
    }    
    else{
        $user->image = "profile.png";
    }
    
    $user->username='SHA'.rand(pow(10, 6-1), pow(10, 6)-1);
    $user->email = $request->email;
    $user->name = $request->name;
    $user->gender = $request->gender;
    $user->mobile = $request->mobile;
    $user->family_cast = Auth::user()->family_cast; 
    $user->family_head = Auth::user()->family_head;
    $user->kuldevi = Auth::user()->kuldevi;
    $user->password =Hash::make($request['password']);
    $user->code=rand(pow(10, 5-1), pow(10, 5)-1);
    $user->gotra= $gotra;
    $user->usertype = "Member";
    $user->active = 'non-active';
    $user->family_id = Auth::user()->family_id;
    $user->madeFor = 'other';
    $user->save();
    $userid = $user->id;
    
    $userdetail = new UserDetail();
    $dob = $request->dob;
    $newDate = date("m-d-Y", strtotime($dob));  
    $userdetail->self_data = $request->self_data;
    $userdetail->name = $request->name;
    $userdetail->relation = $request->relation;
    $userdetail->gender = $request->gender;
    $userdetail->dob = $newDate;
    $userdetail->marriage_status = $request->marriage_status;
    $userdetail->matrimonial = $request->matrimonial; 
    $userdetail->email = $request->email;
    $userdetail->mobile = $request->mobile;
    $userdetail->father_name = $request->father_name;
    $userdetail->mother_name = $request->mother_name;   
    $userdetail->address = $request->address;
    $userdetail->city = $request->city;    
    $userdetail->state = $request->state;
    $userdetail->occupation = $request->occupation;  
    $userdetail->department = $request->department;
    $userdetail->inserted_by = Auth::User()->id ;
    $userdetail->blood_group = $request->blood_group;
    $userdetail->user_id = $userid;
    $userdetail->current_year = $request->current_year;
    $userdetail->education = $request->education;
    $userdetail->graduation = $request->graduation;
    $userdetail->post_graduation = $request->postGraduation;
    $userdetail->present_year = date("Y");
    $userdetail->family_id = Auth::User()->family_id;
    $userdetail->allowsearch = $request->allowsearch;
    $userdetail->grad_year = $request->grad_year;
    $userdetail->highest_education = $request->highest_education;
    $userdetail->spouse_name = $request->spouse_name;
    $userdetail->save();
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

    // Display the list of the family members
    public function userlist()
    {
       // $users = DB::table('users')->where('votes', '=', 100)->get();
       // $matchthis = ['user_id'=>Auth::User()->id];
        $users = DB::table('users_details')->where('user_id', '=', Auth::User()->id)->get();
        return $users;
    //return UserDetail::latest()->paginate(10);
    }

    public function usercounts(){
        return $users = DB::table('users')->count();
    }


    public function bride(){
      
        // $matchthis = ['gender'=>'female','matrimonial'=>1];
        // $result = UserDetail::where($matchthis)->get();
        // return $result;
        $query = app(UserDetail::class)->newQuery(); 
        $query = $query->join('users','users_details.user_id','=','users.id');
        $query= $query->where('users_details.gender','LIKE','female');
        $query= $query->where('matrimonial','LIKE','1');
        
        $request = request();
          if(request()->exists('sort')){
            $sorts = explode(',',request()->sort);
            foreach ($sorts as $sort){
                list($sortCol, $sortDir) = explode('|',$sort);
                $query = $query->orderBy($sortCol,$sortDir);
             } 
        } 
         else { 
                $query = $query->orderBy('id','asc');
            }
      if($request->exists('filter')) {
          $query->where(function($q) use($request){
            $value = "%{$request->filter}%";
            $q->where('users_details.name','like',$value)
                  ->orWhere('father_name','like',$value)
                  ->orWhere('city','like',$value)
                  ->orWhere('mother_name','like',$value); 
          });
      }
      $per_page = request()->has('per_page')?(int) request()->per_page : null;
      $pagination = $query->paginate($per_page);
      $pagination->appends([

          'sort'=>request()->sort,
          'filter'=>request()->filter,
          'per_page'=>request()->per_page
      ]);
       
        return response()->json(
            $pagination
        )
        ->header('Access-Control-Allow-Origin','*')
        ->header('Access-Control-Allow-Methods','GET');
    }

    public function groom(){
      
        // $matchthis = ['gender'=>'female','matrimonial'=>1];
        // $result = UserDetail::where($matchthis)->get();
        // return $result;
        $query = app(UserDetail::class)->newQuery(); 
        $query = $query->join('users','users_details.user_id','=','users.id');
        $query= $query->where('users_details.gender','LIKE','male');
        $query= $query->where('matrimonial','LIKE','1');
        $request = request();
          if(request()->exists('sort')){
            $sorts = explode(',',request()->sort);
            foreach ($sorts as $sort){
                list($sortCol, $sortDir) = explode('|',$sort);
                $query = $query->orderBy($sortCol,$sortDir);
             } 
        } 
         else { 
                $query = $query->orderBy('id','desc');
            }
      if($request->exists('filter')) {
          $query->where(function($q) use($request){
            $value = "%{$request->filter}%";
            $q->where('users_details.name','like',$value)
                  ->orWhere('father_name','like',$value)
                  ->orWhere('city','like',$value)
                  ->orWhere('mother_name','like',$value); 
          });
      }
      $per_page = request()->has('per_page')?(int) request()->per_page : null;
      $pagination = $query->paginate($per_page);
      $pagination->appends([
          'sort'=>request()->sort,
          'filter'=>request()->filter,
          'per_page'=>request()->per_page
      ]);
       
        return response()->json(
            $pagination
        )
        ->header('Access-Control-Allow-Origin','*')
        ->header('Access-Control-Allow-Methods','GET');
    }
    
 public function myUserDetails(Request $request){
       

$this->validate($request,[
    'name'=>'required|string|max:191',
    'relation'=>'required|string|max:191',
    'gender'=>'required|string|max:191',
    'dob'=>'required|string|max:191',
    'marriage_status'=>'required|string|max:191',
    'blood_group'=>'nullable|string',
    
      'address'=>'required|string|max:191',
    'city'=>'required|string|max:191',
    'state'=>'required|string|max:191',
    'occupation'=>'required|string|max:191',
    'password'=>'required|sometimes|string|min:8',
    'photo'=>'required|sometimes|'
 ]);
 $user = new User();
 if($request->photo){
// $name = time().'.'.explode('/'.explode(':',substr($request->photo,0,strpos($request->photo,':')))[1][1]);
     $imageName = preg_match_all('/data\:image\/([a-zA-Z]+)\;base64/',$request->photo,$matched);
     $ext = isset($matched[1][0]) ? $matched[1][0] : false;
     $imageName = sha1(time()) . '.' .$ext; 
     $img = \Image::make($request->photo);
     $img->resize(300, null, function ($constraint) {
     $constraint->aspectRatio();
  });
      $img->save(public_path('images/profile/').$imageName);
      $user->image = $imageName;
     // $user->save();
     
     DB::table('users')
     ->where('id', Auth::User()->id)
     ->update(['image' => $imageName]);
 
 }    
 else {
    DB::table('users')
    ->where('id', Auth::User()->id)
    ->update(['image' => 'profile.png']);

 }

            $userdetail = new UserDetail();

            $userdetail->self_data = 'yes';
            $userdetail->name = $request->name;
            $userdetail->relation = $request->relation;
            $userdetail->gender = $request->gender;
            $userdetail->dob = $request->dob;
            $userdetail->marriage_status = $request->marriage_status;
            $userdetail->matrimonial = $request->matrimonial; 
            $userdetail->email = $request->email;
            $userdetail->mobile = $request->mobile;
            $userdetail->father_name = $request->father_name;
            $userdetail->mother_name = $request->mother_name;   
            $userdetail->address = $request->address;
            $userdetail->city = $request->city;    
            $userdetail->state = $request->state;
            $userdetail->occupation = $request->occupation;  
            $userdetail->department = $request->department;
            $userdetail->inserted_by = Auth::User()->id ;
            $userdetail->blood_group = $request->blood_group;
            $userdetail->user_id = Auth::User()->id ;
            $userdetail->family_id = Auth::User()->family_id ;

            $userdetail->save();
        
    }
   
    public function updateUserType(Request $request, $id){
       $event = User::findOrFail($id);
        $this->validate($request,[
           'usertype'=>'required' 
        ]);
        $r = $request['usertype'];
        DB::table('users')
        ->where('id', $id)
        ->update(['usertype' => $r]);
        return ['message'=> 'user updated successfully'];  
    }

    public function checkUserStatus() {
        $user = Auth::user();
        $id = $user->id;
        $result = DB::table('users_details')
        ->where([
            ['inserted_by','=',$id],
            ['user_id','=',$id]
        ])->count();
           
        return $result;
        // if($result>0){
        //     return true;
        // }
        // else {
        //     return false;
        // }

        
    }
public function mydetails(){
    $user = Auth::user();
    $r = DB::table('users_details')
        ->where('user_id','=',$user->id)
        ->get();
        return  $r;
}

// This function is used to update users own details 

public function updateMydetails(Request $request, $id){

   $user = UserDetail::findorfail($id);
    $this->validate($request,[
        'name'=>'required|string|max:191',
        'relation'=>'required|string|max:191',
        'gender'=>'required|string|max:191',
        'dob'=>'required|string|max:191',
        'marriage_status'=>'required|string|max:191',
        'blood_group'=>'required|sometimes|string',
        
        'address'=>'required|string|max:191',
        'city'=>'required|sometimes|string|max:191',
        'state'=>'required|string|max:191',
        'occupation'=>'required|string|max:191',
        'password'=>'required|sometimes|string|min:8',
        'photo'=>'required|sometimes|'
     ]);
     $userid = Auth::user()->id;
     if($request->photo){
        // $name = time().'.'.explode('/'.explode(':',substr($request->photo,0,strpos($request->photo,':')))[1][1]);
            $imgname = DB::table('users')
                        ->where('id',$userid)
                        ->value('image');
            unlink(public_path('images/profile/').$imgname);
            
            $imageName = preg_match_all('/data\:image\/([a-zA-Z]+)\;base64/',$request->photo,$matched);
             $ext = isset($matched[1][0]) ? $matched[1][0] : false;
             $imageName = sha1(time()) . '.' .$ext; 
             $img = \Image::make($request->photo);
             $img->resize(300, null, function ($constraint) {
             $constraint->aspectRatio();
          });
              $img->save(public_path('images/profile/').$imageName);
             // $user->image = $imageName;
              DB::table('users')
              ->where('id', $userid)
              ->update(['image' => $imageName]);
        
         }       

     $user->update($request->all());
    

}
// Function to get cities
public function getcities($state){
 $result = DB::table('cities')->where('city_state',$state)->pluck('city_name');
 return $result;
}

public function getuserdetail($id){
   // $result = DB::table('users_details')->where('user_id', $id)->first();
    $r = DB::table('users_details')
        ->where('user_id','=',$id)
        ->get();
        return  $r;
  // return $result;   
  }

  public function checkAuth($id){
      $familyid = DB::table('users')->where('id', auth()->user()->id )->pluck('family_id');
      $userfamily = DB::table('users_details')->where('user_id',$id)->pluck('family_id');
      if($familyid == $userfamily){
          return 1;
      }
      else{
          return 0;
      }
  }

  public function updateuserdetails(Request $request, $id){

    $user = UserDetail::findorfail($id);
     $this->validate($request,[
         'name'=>'required|string|max:191',
         'relation'=>'required|string|max:191',
         'gender'=>'required|string|max:191',
         'dob'=>'required|string|max:191',
         'marriage_status'=>'required|string|max:191',
         'address'=>'required|string|max:191',
         'city'=>'required|sometimes|string|max:191',
         'state'=>'required|string|max:191',
         'occupation'=>'required|string|max:191',
         'password'=>'required|sometimes|string|min:8',
         'photo'=>'required|sometimes|',
         
      ]);
      $userid = $user->user_id;
      if($request->photo){
         // $name = time().'.'.explode('/'.explode(':',substr($request->photo,0,strpos($request->photo,':')))[1][1]);
             $imgname = DB::table('users')
                         ->where('id',$userid)
                         ->value('image');
             unlink(public_path('images/profile/').$imgname);
             
             $imageName = preg_match_all('/data\:image\/([a-zA-Z]+)\;base64/',$request->photo,$matched);
              $ext = isset($matched[1][0]) ? $matched[1][0] : false;
              $imageName = sha1(time()) . '.' .$ext; 
              $img = \Image::make($request->photo);
              $img->resize(300, null, function ($constraint) {
              $constraint->aspectRatio();
           });
               $img->save(public_path('images/profile/').$imageName);
              // $user->image = $imageName;
               DB::table('users')
               ->where('id', $userid)
               ->update(['image' => $imageName,
                          'name' => $request['name']  ]);
         
          }       
          DB::table('users')
          ->where('id', $userid)
          ->update(['name' => $request['name']  ]);

        //   DB::table('users_details')
        //   ->where('user_id', $userid)
        //   ->update(['allowsearch' => $request['allowsearch']  ]);
      $user->update($request->all());
     
 
 }
 public function getuserdirectory(){
      
    
    $query = app(UserDetail::class)->newQuery();
  $query = $query->where('allowsearch','LIKE', 0); 
   // $query = $query->select('users_details.*','users.username');
   // $query = $query->join('users','users_details.user_id','=','users.id'); 
  
    $request = request();
      if(request()->exists('sort')){
        $sorts = explode(',',request()->sort);
        foreach ($sorts as $sort){
            list($sortCol, $sortDir) = explode('|',$sort);
            $query = $query->orderBy($sortCol,$sortDir);
         } 
    } 
     else { 
            $query = $query->orderBy('id','asc');
        }
  if($request->exists('filter')) {
      $query->where(function($q) use($request){
        $value = "%{$request->filter}%";
        $q->where('name','like',$value)
              ->orWhere('name','like',$value)
            //  ->orWhere('username','like',$value)
              ->orWhere('occupation','like',$value)
              ->orWhere('department','like',$value)
              ->orWhere('state','like',$value)
              ->orWhere('city','like',$value); 
      });
  }
  $per_page = request()->has('per_page')?(int) request()->per_page : null;
  $pagination = $query->paginate($per_page);
  $pagination->appends([
      'sort'=>request()->sort,
      'filter'=>request()->filter,
      'per_page'=>request()->per_page
  ]);
   
    return response()->json(
        $pagination
    )
    ->header('Access-Control-Allow-Origin','*')
    ->header('Access-Control-Allow-Methods','GET');
}

public function loadgrooms(){
 $query = DB::table('users_details')
            ->join('users','users_details.user_id','=','users.id')
            ->select('users_details.*','users.gotra','users.image')
            ->where('users_details.gender','like','male')
            ->where('matrimonial','like','1')
            ->paginate(10);

 return $query;           

}
public function getgrooms(){

    $name =  $_GET['name'];
    $gotra =  $_GET['gotra'];
    $city =  $_GET['city'];

    $query = DB::table('users_details')
            ->join('users','users_details.user_id','=','users.id')
            ->select('users_details.*','users.gotra','users.image')
            ->where('users_details.gender','like','male')
            ->where('matrimonial','like','1')
            ->where('users_details.name','like',"%$name%")
            ->where('users.gotra','like',"%$gotra%")
            ->where('users_details.city','like',"%$city%")
            ->paginate(10);
    return $query;
}

public function getbrides(){

    $name =  $_GET['name'];
    $gotra =  $_GET['gotra'];
    $city =  $_GET['city'];

    $query = DB::table('users_details')
            ->join('users','users_details.user_id','=','users.id')
            ->select('users_details.*','users.gotra','users.image')
            ->where('users_details.gender','like','female')
            ->where('matrimonial','like','1')
            ->where('users_details.name','like',"%$name%")
            ->where('users.gotra','like',"%$gotra%")
            ->where('users_details.city','like',"%$city%")
            ->paginate(10);
    return $query;
}
public function loadbrides(){
    $query = DB::table('users_details')
               ->join('users','users_details.user_id','=','users.id')
               ->select('users_details.*','users.gotra','users.image')
               ->where('users_details.gender','like','female')
               ->where('matrimonial','like','1')
               ->paginate(10);
   
    return $query;           
   
   }

public function loadmembers(){
    $query = DB::table('users_details')
               ->join('users','users_details.user_id','=','users.id')
               ->select('users_details.*','users.gotra')
               ->where('users_details.allowsearch','like','0')
               ->paginate(10);

          return $query;     
} 

public function getmembers(){

    $name =  $_GET['name'];
    $gotra =  $_GET['gotra'];
    $occupation =  $_GET['occupation'];
    $department =  $_GET['department'];
    $state =  $_GET['state'];
    $city =  $_GET['city'];

    $query = DB::table('users_details')
            ->join('users','users_details.user_id','=','users.id')
            ->select('users_details.*','users.usertype','users.gotra')
            ->where('users_details.allowsearch','like','0')
            ->where('users_details.name','like',"%$name%")
            ->where('users_details.occupation','like',"%$occupation%")
            ->where('users_details.department','like',"%$department%")
            ->where('users.gotra','like',"%$gotra%")
            ->where('users_details.state','like',"%$state%")
            ->where('users_details.city','like',"%$city%")
            ->paginate(10);

    return $query;        

}


}
