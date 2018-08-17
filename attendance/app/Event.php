<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event
{
    
	public $term;
	public $event;
    public $date;
	public $count;
	public $members;

    public function __construct($term, $event, $date, $count, $members) {
      $this->term = $term;
      $this->event = $event;
      $this->date = $date;
      $this->count = $count;
      $this->members = $members;
    }

    /**
    public function getEvent() {
    	return $this->event;
    }

    public function getTerm() {
    	return $this->term;
    }

    public function getCount() {
    	return $this->count;
    }

    public function getMembers() {
    	return $this->members;
    }

    public function setEvent($event) {
    	$this->event = $event;
    }

    public function setTerm($term) {
    	$this->term = $term;
    }

    public function se
    */
}

?>