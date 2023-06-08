<?php

namespace App\Http\Controllers\Admin;

use App\Eventregistration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventregistrationController extends Controller
{
    private $controller_title = 'Записи на мероприятия';
    private $controller_name = 'eventregistrations';

    public function index()
    {
        $items = Eventregistration::all();

        return view('admin.'.$this->controller_name.'_list')->with([
            'items' => $items,
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Eventregistration $eventregistration)
    {
        //
    }

    public function edit(Eventregistration $eventregistration)
    {

    }

    public function update(Request $request, Eventregistration $eventregistration)
    {

    }

    public function destroy(Eventregistration $eventregistration)
    {
        $eventregistration->delete();

        return redirect()->route($this->controller_name.'.index');
    }
}
