<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $controller_title = 'Категории';
    private $controller_name = 'categories';

    public function index()
    {
        $items = Category::all();

        return view('admin.'.$this->controller_name.'_list')->with([
            'items' => $items,
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function create()
    {
        $item = new Category();

        return view('admin.'.$this->controller_name.'_form')->with([
            'item' => $item,
            'type' => 'add',
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'title' => $request->get('title'),
        ]);

        return redirect()->route($this->controller_name.'.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.'.$this->controller_name.'_form')->with([
            'item' => $category,
            'type' => 'edit',
            'controller_title' => $this->controller_title,
            'controller_name' => $this->controller_name,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'title' => $request->get('title'),
        ]);

        return redirect()->route($this->controller_name.'.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route($this->controller_name.'.index');
    }
}
