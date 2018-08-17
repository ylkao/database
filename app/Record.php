<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    
	public $fillable = [
        'term', 'event', 'date', 'name'
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
