<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{

    public function index(){
        $menuItems = Menu::orderByDesc('id')->get();


        return view('menu',compact('menuItems'));
    }

    public function store(){
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent' => ['nullable', 'integer'],
        ]);

        $menu = new Menu();
        $menu->create($inputs);

        return redirect()->back();
    }

    public function edit(Menu $item){
        $inputs = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'parent' => ['nullable', 'integer'],
        ]);

        $item->update($inputs);

        return redirect()->back();
    }

    public function delete(Menu $item){
        $item->delete();
        return redirect()->back();
    }

}
?>
