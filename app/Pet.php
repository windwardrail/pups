<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function pictures() {
    	return $this->hasMany('App\Picture');
    }

    public function updates(){
        return $this->hasMany('App\Update');
    }
}
