<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $menues = Menu::orderBy('parent','asc')->paginate(8);
        return view('admin.menu', ['menues' => $menues]);
    }

    protected function show()
    {
    }

    protected function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $menues = Menu::all();
        return view('admin.menu_create', ['menues' => $menues]);
    }

    protected function store(Request $request)
    {
        $menu = Menu::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'parent' => $request->parent,
            'order' => $request->orden,
            'enabled' => $request->enabled,
        ]);
        return redirect()->route('menus.index');
    }

    protected function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $mn = Menu::find($id);
        $menues = Menu::all();
        return view('admin.menu_update', ['mn' => $mn,'menues' => $menues]);
    }

    public function update(Request $request, $id)
    {
        Menu::where('id', $id)->update([
            'name' =>$request->name,
            'slug' =>$request->slug,
            'parent' =>$request->parent,
            'order' =>$request->orden,
            'enabled' =>$request->enabled,
        ]);
        return redirect()->route('menus.index');
    }

    protected function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $mn = Menu::find($id);
        $mn->delete();
        return redirect()->route('menus.index');
    }

}
