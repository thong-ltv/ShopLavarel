<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index()
    {
        // dd('list menus');//in ra man hinh
        $menus = $this->menu->latest('id')->paginate(3);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $htmlOptionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menus.add', compact('htmlOptionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([  //ham create de insert du lieu
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-') //slug dung de chuyen string thanh slug
        ]);

        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
       $menuEditId = $this->menu->find($id);
       $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuEditId->parent_id);
       return view('admin.menus.edit', compact('menuEditId', 'optionSelect'));
    }

    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        
        return redirect()->route('menus.index');
    }
}
