<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Request;
use App\Page;
use Intervention\Image\ImageManagerStatic as Image;

class Tool extends Model
#выбор даты времени
{
    public static function rdate($param, $time=0,$type=1) {
        if(intval($time)==0)$time=time();
        if ($type == 2) {
            $MonthNames=array("январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь");
        }
        else {
            $MonthNames=array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
        }
        if(strpos($param,'M')===false) return date($param, $time);
        else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
    }
    //проверка url страницы
    public static function checkPage() {
        $url = Request::path();

        $url = str_replace('/', '', $url);

        $page = Page::where('slug', '=', $url)->first();

        if ($page) {
            return $page;
        }
        else {
            return false;
        }
    }
    //получение изображения
    public static function getImage($image, $width, $height) {
        $filename = basename(public_path() . '/upload' . $image);
        if (!file_exists(public_path() . '/upload' . $image)) {
            return false;
        }
        $filename = '/upload/thumb/'.$width.'x'.$height.$filename;
        if (!file_exists(public_path() . $filename)) {
            $img = Image::make(public_path() . '/upload' . $image);
            $img->fit($width, $height);
            $img->save(public_path() . $filename);
        }
        return $filename;
    }
    //cклонения
    public static function declension($number, array $data)
    {
        $number = str_replace('+', '', $number);

        $tmp = explode('-', $number);

        $number = end($tmp);

        $rest = [$number % 10, $number % 100];

        if($rest[1] > 10 && $rest[1] < 20) {
            return $data[2];
        } elseif ($rest[0] > 1 && $rest[0] < 5) {
            return $data[1];
        } else if ($rest[0] == 1) {
            return $data[0];
        }

        return $data[2];
    }
}
