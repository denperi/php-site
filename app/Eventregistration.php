<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventregistration extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'email',
        'name',
    ];

    public function event() {
        return $this->hasOne('App\Event', 'id', 'event_id');
    }
}
