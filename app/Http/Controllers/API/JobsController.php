<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Auth;
use App\Job;
use App\Application;
use App\Fake_jobs;


class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth:api');
        
    }

    public function index()
    {
      $query = app(Fake_jobs::class)->newQuery(); 
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
            $q->where('title','like',$value)
                  ->orWhere('contact_person','like',$value)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'  => 'required|string|max:255',
            'description' =>'required|string',
            'city' =>'required|string|max:191',
            'contact_person' =>'required|string|max:191',
            'contact_number' =>'required|string|max:20',
        ]);
        //
        $userid = Auth::User()->id;
        return Job::create([
            'title'=>$request['title'],
            'description'=>$request['description'],
            'city'=>$request['city'],
            'contact_person'=>$request['contact_person'],
            'contact_number'=>$request['contact_number'],
            'user_id'=>$userid
        ]);

    }
    //    Get job category for the 
    public function getjobcategory(){
        
        $job_category = DB::table('job_category')->paginate(10);
        return $job_category;
    }

    public function applyjob(Request $request){
        $userid = Auth::User()->id;
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'skill'=>'required|string|max:191',
            'city'=>'required|string|max:191',
            'contact_number'=>'required|string|max:191'

        ]);
        $data = [
            'name'=>$request['name'],
            'apply_for'=>$request['skill'],
            'contact_number'=>$request['contact_number'],
            'city'=>$request['city'],
            'status'=>'available',
            'user_id'=>$userid
        ];

        DB::table('apply_jobs')->insert($data);
    }
    public function createjobcategory(Request $request){
       
        $userid = Auth::User()->id;
        $this->validate($request,[
            'job_category'=> 'required|string|max:255',
            'description'=>'required|string'
            ]);

            $data = [
                'job_category'=>$request['job_category'],
                'description'=>$request['description'],
                'user_id'=> $userid
            ];

            DB::table('job_category')->insert($data);

    //   return DB::table('job_category')->insert([
    //         'job_category' => $request['job_category'],
    //         'description' => $request['description'],
    //         'user_id'=> $userid
    //     ]); 

    }

     

    /*
    function to delete job categories
    */

    public function deletejobcategory($id){

        DB::table('job_category')->where('id', 'LIKE', $id)->delete();
        return ['message'=>' job category deleted'];

    }

    public function getjob_category(){
        
        $job_category = DB::table('job_category')->get('job_category');
        return $job_category;
    }
    
    public function get_applicants(){
      
        $query = app(Application::class)->newQuery(); 
      
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
                  ->orWhere('apply_for','like',$value)
                  ->orWhere('city','like',$value)
                  ->orWhere('contact number','like',$value); 
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

    // Retrieve applications

    public function my_application(){
        $matchthis = ['user_id'=>Auth::User()->id];
        return Application::where($matchthis)->paginate(10);

    }
    public function delete_myapplication($id){
        DB::table('apply_jobs')->where('id', 'LIKE', $id)->delete();
        return ['message'=>' applied job deleted'];
    }

    public function updateApplication(Request $request, $id){

        $application = Application::findOrFail($id);     
        $this->validate($request,[
            'name' =>'required|string|max:255',
            'apply_for'=>'string|max:255|nullable',
            'city'=>'string|max:255',
            'contact_number'=>'string|max:20',
        ]);
        
        $application->update($request->all());  
    

    }

}
