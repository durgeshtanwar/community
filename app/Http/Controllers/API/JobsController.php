<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Auth;
use App\Job;
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
       
    public function getjobcategory(){
        
        $job_category = DB::table('job_category')->paginate(10);
        return $job_category;
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

    /*
    function to delete job categories
    */

    public function deletejobcategory($id){

        DB::table('job_category')->where('id', 'LIKE', $id)->delete();
        return ['message'=>' job category deleted'];

    }


}