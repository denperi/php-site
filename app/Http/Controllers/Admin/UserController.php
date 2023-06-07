<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Difflevel;
use App\Task;
use App\Tasktype;
use App\User;
use App\Usercategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Exports\UserReportExport;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    private $controller_title = 'Пользователи';
    private $controller_name = 'users';

    public function index()
    {
        $items = User::all();

        return view('admin.'.$this->controller_name.'_list')->with([
            'items' => $items,
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function create()
    {
        $item = new User();
        $item->role = 1;

        return view('admin.'.$this->controller_name.'_form')->with([
            'item' => $item,
            'type' => 'add',
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'name' => $request->get('name'),
            'password' => Hash::make($request->get('password')),
        ]);

        return redirect()->route($this->controller_name.'.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('admin.'.$this->controller_name.'_form')->with([
            'item' => $user,
            'type' => 'edit',
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'role' => $request->get('role'),
            'name' => $request->get('name'),
        ]);

        if ($request->get('password') != '') {
            $user->update([
                'password' => Hash::make($request->get('password')),
            ]);
        }

        return redirect()->route($this->controller_name.'.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route($this->controller_name.'.index');
    }
}
