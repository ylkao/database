<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Record;
use App\Event;

class EventsController extends Controller
{

    /**
     Create the array of events with the relevant info to display
    */
    public function event() {
        $user = Auth::user();
        $records = $user->records;
        $events = array();
        # deciding the info I want to display: unique event name to count
        # another query to decide the term and date of the event
        # another query with link to members
        foreach ($records as $rec) {
            $event_str = $rec->event." ".$rec->term;
            if (isset($events[$event_str])) {
                $event_obj = $events[$event_str];
                $event_obj->count += 1;
                array_push($event_obj->members, $rec->name);
            } else {
                $event_obj = new Event($rec->term, $rec->event, $rec->date, 1, array());
                $events[$event_str] = $event_obj;
            }
        }
        return view('event')->with('event_list', $events); //('events'));
    }

    public function add()
    {
    	return view('addevent');
    }

    public function create(Request $request)
    {
        
        $members = $request->name;
        $members = explode("\n", $request->name);
        for($i = 0; $i < count($members); $i++) {
            $members[$i] = str_replace("\n", "" , $members[$i]); //remove newline characters
            $members[$i] = str_replace("\r", "" , $members[$i]);
            $members[$i] = ucwords(strtolower($members[$i]));
            $record = new record();
            $record->term = $request->term;
            $record->event = $request->event;
            $record->date = $request->date;
            $record->name = $members[$i];
            $record->user_id = Auth::id();
            $record->save();
        }
    	return redirect('/event'); 
    }

    public function edit(Record $record)
    {

    	if (Auth::check() && Auth::user()->id == $record->user_id)
        {            
                return view('edit', compact('record'));
        }           
        else {
             return redirect('/event');
         }            	
    }

    public function update(Request $request, Record $record)
    {
    	if(isset($_POST['delete'])) {
    		$record->delete();
    		return redirect('/event');
    	}
    	else
    	{
	    	$record->save();
	    	return redirect('/event'); 
    	}    	
    }
}