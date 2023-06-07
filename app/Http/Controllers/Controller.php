<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Meta;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        # Default title
        Meta::set('title', 'Novometall.ru - металлоконструкцие, быстровозводимые строения и сварочные работы в Томске');
        Meta::set('description', 'Novometall.ru - металлоконструкцие, быстровозводимые строения и сварочные работы в Томске');
    }
}
