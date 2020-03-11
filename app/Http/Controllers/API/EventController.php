<?php

namespace App\Http\Controllers\API;

use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Notification;
use App\Notifications\Events;
use App\Event;
use App\User;

class EventController extends Controller
{

    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function index()
    {
        //
        $query = app(Event::class)->newQuery(); 
      
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
            $q->Where('event_name','like',$value)
                  ->orWhere('event_venue','like',$value)
                  ->orWhere('remarks','like',$value); 
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
        //
        $this->validate($request ,[
            'event_name'=>'string|required|max:255',
            'date'=>'string|required',
            'event_venue'=>'string|nullable',
            'remarks'=>'string|nullable|max:255'
        ]);
        $users = User::all();
        $details = $request['event_name'];
        Notification::send($users, new Events($details));
        $dob = $request->$request['date'];
        $newDate = date("m-d-Y", strtotime($dob));  
        return Event::create([
            'event_name'=>$request['event_name'],
            'date'=>$newDate,
            'event_venue'=>$request['event_venue'],
            'remarks'=>$request['remarks']
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
        $event = Event::findOrFail($id);
        $this->validate($request ,[
            'event_name'=>'string|required|max:255',
            'date'=>'string|required',
            'event_venue'=>'string|nullable',
            'remarks'=>'string|nullable|max:255'
        ]);
        $dob = $request->$request['date'];
        $newDate = date("m-d-Y", strtotime($dob));  
        $data = [
            'event_name'=>$request['event_name'],
            'date'=>$newDate,
            'event_venue'=>$request['event_venue'],
            'remarks'=>$request['remarks']
        ];
       DB::table('events')
            ->where('id',$id)
            ->update($data);

        return ['message'=> 'event updated successfully'];
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
        DB::table('events')->where('id', 'LIKE', $id)->delete();
        return ['message'=>' Event deleted Successfully'];
    }
}
