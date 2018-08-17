<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Record;
use App\Event;

class MembersController extends Controller
{
    public function member() {
        $user = Auth::user();
        $records = $user->records;
        $members = array();
        foreach ($records as $rec) {
            if (array_key_exists($rec->name, $members)) {
                array_push($members[$rec->name], $rec->term." ".$rec->event);
            } else {
                $members[$rec->name] = array();
                array_push($members[$rec->name], $rec->term." ".$rec->event);
            }
        }
        return view('member')->with('members', $members);
    }

    public function add()
    {
        //get event info
        $user = Auth::user();
        $records = $user->records;
        $events = array();
        foreach ($records as $rec) {
            $event_str = $rec->event." ".$rec->term;
            if (isset($events[$event_str])) {
                $event_obj = $events[$event_str];
                $event_obj->count += 1;
                array_push($event_obj->members, $rec->name);
            } else {
                $event_obj = new Event($rec->term, $rec->event, 1, array());
                $events[$event_str] = $event_obj;
            }
        }
        return view('addmember')->with('event_list', $events);
    }

    public function create(Request $request)
    {
    	$record = new record();
        $record->term = $request->term;
        $record->event = $request->event;
        $record->date = $request->date;
        $record->name = $request->name;
    	$record->user_id = Auth::id();
    	$record->save();
    	return redirect('/member'); 
    }

    public function event($event) {
        return view('memberEvent')->with('event', $event);
    }

    public function edit(Record $record)
    {

    	if (Auth::check() && Auth::user()->id == $record->user_id)
        {            
                return view('edit', compact('record'));
        }           
        else {
             return redirect('/member');
         }            	
    }

    public function update(Request $request, Record $record)
    {
    	if(isset($_POST['delete'])) {
    		$record->delete();
    		return redirect('/member');
    	}
    	else
    	{
	    	$record->save();
	    	return redirect('/member'); 
    	}    	
    }
}