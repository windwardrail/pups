<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function pet() {
    	return $this->belongsTo("App\Pet");
    }
}
