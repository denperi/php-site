<?php

namespace App\Http\Controllers\Front;

use App\Event;
use App\Eventregistration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::where('date', '>=', date('Y-m-d'))->get();

        return view('front.index')->with([
            'events' => $events,
        ]);
    }

    public function event(Event $event) {
        return view('front.event')->with([
            'event' => $event,
        ]);
    }
//создание меро
    public function event_registration(Event $event, Request $request) {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }
        else {
            $user_id = 0;
        }

        $er = Eventregistration::create([
            'user_id' => $user_id,
            'event_id' => $event->id,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        return redirect()->back();
    }
//вывод инфы о пользователе
    public function profile() {
        $user = Auth::user();

        return view('front.profile')->with([
            'user' => $user,
        ]);
    }
//редактирование профиля
    public function profile_save(Request $request) {
        $user = Auth::user();

        $user->update([
            'name' => $request->get('name'),
        ]);

        if ($request->get('password') != '') {
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
        }

        return redirect()->back();
    }
}
