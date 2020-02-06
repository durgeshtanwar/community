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
           'email'=>'required|string|max:255|unique:users',
           'mobile'=>'required|string|max:20',
           'father_name'=>'required|string|max:191',
           'mother_name'=>'required|string|max:191',
           'address'=>'required|string|max:191',
           'city'=>'required|string|max:191',
           'state'=>'required|string|max:191',
           'occupation'=>'required|string|max:191',
           'password'=>'required|string|min:8',
           'username'=>'required|string|unique:users|max:191',


       ]);
       $userid = Auth::user();

    $user = new User();
    $user->email = $request->email;
    $user->name = $request->name;
    $user->username = $request->username;
    $user->family_cast = Auth::user()->family_cast; 
    $user->family_head = Auth::user()->family_head;
    $user->password =Hash::make($request['password']);
    $user->code=rand(pow(10, 5-1), pow(10, 5)-1);
    $user->gotra= $gotra;
    $user->usertype = "Member";
    $user->save();
    
    $userdetail = new UserDetail();
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
    $userdetail->post_graduate_degree = $request->post_graduate_degree;
    $userdetail->post_graduate_university = $request->post_graduate_university;
    $userdetail->post_graduate_university_city = $request->post_graduate_university_city; 
    $userdetail->post_graduate_university_state = $request->post_graduate_university_state;   
    $userdetail->post_graduate_university_percentage = $request->post_graduate_university_percentage;
    $userdetail->post_graduate_year_of_passing = $request->post_graduate_year_of_passing;
    $userdetail->graduate_degree = $request->graduate_degree;
    $userdetail->graduate_university = $request->graduate_university;
    $userdetail->graduate_university_city = $request->graduate_university_city; 
    $userdetail->graduate_university_state = $request->graduate_university_state;   
    $userdetail->graduate_university_percentage = $request->graduate_university_percentage;
    $userdetail->graduate_year_of_passing = $request->graduate_year_of_passing;
    $userdetail->class_12_board = $request->class_12_board;
    $userdetail->class_12_school_name = $request->class_12_school_name;
    $userdetail->class_12_percentage = $request->class_12_percentage;
    $userdetail->class_12_year_of_passing = $request->class_12_year_of_passing;
    $userdetail->class_12_city = $request->class_12_city;
    $userdetail->class_10_board = $request->class_10_board;
    $userdetail->class_10_school_name = $request->class_10_school_name;
    $userdetail->class_10_percentage = $request->class_10_percentage;
    $userdetail->class_10_year_of_passing = $request->class_10_year_of_passing;
    $userdetail->class_10_city = $request->class_10_city;
    $userdetail->user_id = Auth::User()->id;

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
  $matchthis = ['user_id'=>Auth::User()->id];
        return UserDetail::where($matchthis)->get();
    //return UserDetail::latest()->paginate(10);
    }
    public function bride(){
      
        // $matchthis = ['gender'=>'female','matrimonial'=>1];
        // $result = UserDetail::where($matchthis)->get();
        // return $result;
        $query = app(UserDetail::class)->newQuery(); 
        $query= $query->where('gender','LIKE','female');
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
            $q->where('name','like',$value)
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
