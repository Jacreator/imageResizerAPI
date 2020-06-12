<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
