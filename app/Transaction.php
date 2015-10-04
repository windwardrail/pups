<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $fillable = ['transaction_id', 'order_time'];

    public function donor() {
        return $this->belongsTo('App\Donor');
    }
}
