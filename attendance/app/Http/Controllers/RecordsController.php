<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Record;
use App\Event;

class RecordsController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
    	return view('welcome', compact('user'));
    }

    public function list() {
        $user = Auth::user();
        return view('list', compact('user'));
    }

    public function add()
    {
    	return view('add');
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
    	return redirect('/list'); 
    }

    public function edit(Record $record)
    {

    	if (Auth::check() && Auth::user()->id == $record->user_id)
        {            
                return view('edit', compact('record'));
        }           
        else {
             return redirect('/list');
         }            	
    }

    public function update(Request $request, Record $record)
    {
    	if(isset($_POST['delete'])) {
    		$record->delete();
    		return redirect('/list');
    	}
    	else
    	{
    		$record->term = $request->term;
            $record->event = $request->event;
            $record->date = $request->date;
            $record->name = $request->name;
	    	$record->save();
	    	return redirect('/list'); 
    	}    	
    }
}