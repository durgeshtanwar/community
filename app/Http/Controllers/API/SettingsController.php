<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Directory;

class SettingsController extends Controller
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
//  News section 
// this is the function to get the news from database
   public function getnews(){
    $news = DB::table('news')->paginate(10);
    return $news;
   }

    public function insertnews(Request $request){
        $this->validate($request,[
            'news_title' => 'required|string|max:191',
            'news_description'=>'required|string|max:191',
            'url'=>'string|max:191|nullable',
            'status'=>'required|string|max:191'

        ]);

        $data = [
            'news_title'=>$request['news_title'],
            'news_description'=>$request['news_description'],
            'url'=>$request['url'],
            'status'=>$request['status']
        ];
        DB::table('news')->insert($data);
    }
    //  function to delete the news from 
    public function deletenews($id){

        DB::table('news')->where('id', 'LIKE', $id)->delete();
        return ['message'=>'News Deleted'];

    }

//  Settings for directory

    public function addtodirectory(Request $request){

        $this->validate($request,[
            'name' =>'required|string|max:255',
            'address'=>'string|max:255|nullable',
            'profession'=>'string|max:255|nullable',
            'contact_number'=>'string|max:20',
            'city'=>'string|max:255',
            'state'=>'string|max:255'
        ]);
        $data = [
            'name'=>$request['name'],
            'address'=>$request['address'],
            'profession'=>$request['profession'],
            'contact_number'=>$request['contact_number'],
            'city'=>$request['city'],
            'state'=>$request['state']
        ];
        DB::table('directory')->insert($data);
        return ['message'=>' added to directory'];
    }


// Get the directory
 public function showdirectory(){
      
        // $matchthis = ['gender'=>'female','matrimonial'=>1];
        // $result = UserDetail::where($matchthis)->get();
        // return $result;
        $query = app(Directory::class)->newQuery(); 
      
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
                  ->orWhere('profession','like',$value)
                  ->orWhere('contact_number','like',$value)
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
}