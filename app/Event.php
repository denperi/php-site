<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
#Создание мероприятия
class Event extends Model
{
    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'address',
        'date',
        'category_id'
    ];

    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}
