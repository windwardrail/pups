<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    public function pet() {
        return $this->belongsTo('App\Pet');
    }
}
