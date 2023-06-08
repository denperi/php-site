<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
#Создание мероприятия
class Event extends Model
{
    use SoftDeletes;
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
