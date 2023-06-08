<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class EventController extends Controller
{
    private $controller_title = 'Мероприятия';
    private $controller_name = 'events';

    public function index()
    {
        $items = Event::all();

        return view('admin.'.$this->controller_name.'_list')->with([
            'items' => $items,
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }
#Добавление записей в таблицу
    public function create()
    {
        $item = new Event();
        $item->price = 0;

        return view('admin.'.$this->controller_name.'_form')->with([
            'item' => $item,
            'type' => 'add',
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function store(Request $request)
    {
        $event = Event::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'address' => $request->get('address'),
            'date' => $request->get('date'),
            'category_id' => $request->get('category_id'),
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = rand(1000000,9999999) . '_' . Str::slug($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/upload/'.$this->controller_name.'/', $filename);

            $event->update([
                'image' => '/'.$this->controller_name.'/' . $filename,
            ]);
        }

        return redirect()->route($this->controller_name.'.index');
    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Event $event)
    {
        return view('admin.'.$this->controller_name.'_form')->with([
            'item' => $event,
            'type' => 'edit',
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $event->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'address' => $request->get('address'),
            'date' => $request->get('date'),
            'category_id' => $request->get('category_id'),
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = rand(1000000,9999999) . '_' . Str::slug($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/upload/'.$this->controller_name.'/', $filename);

            $event->update([
                'image' => '/'.$this->controller_name.'/' . $filename,
            ]);
        }

        return redirect()->route($this->controller_name.'.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route($this->controller_name.'.index');
    }
}
