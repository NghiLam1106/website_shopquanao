<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Requests\Menu\CreaterFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create(){
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
           // 'menus' => $this->menuService->getParent()
        ]);
    }
    public function store(CreaterFormRequest $request){
        $result = $this->menuService->create($request);

        return redirect()->back();
    }
    public function index(){
        return view('admin.menu.list',[
            'title' => 'Danh sách Danh Mục',
            'menus' => $this->menuService->listAllMenu()
        ]);
    }
    // public function destroy(Request $request)
    // {
    //     $result = $this->menu
    // }
}