<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model {

    const ONE_TIME = 'one';
    const RECURRING = 'recurring';

    const MINIMUM_DONATION = 5.0;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'subscribed'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet() {
        return $this->belongsTo('App\Pet');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaction() {
        return $this->hasOne('App\Transaction');
    }
}
