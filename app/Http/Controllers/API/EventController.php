<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Event;

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
        $events = DB::table('events')->paginate(10);
        return $job_category;
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
            'event_date'=>'string|required',
            'event_venue'=>'string|nullable',
            'remarks'=>'string|nullable|max:255'
        ]);
        return Event::create([
            'event_name'=>$request['event_name'],
            'date'=>$request['event_date'],
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
            'event_date'=>'string|required',
            'event_venue'=>'string|nullable',
            'remarks'=>'string|nullable|max:255'
        ]);
        $event->update($request->all());  
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
