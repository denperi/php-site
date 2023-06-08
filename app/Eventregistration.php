<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Eventregistration extends Model
{
    use SoftDeletes;
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
