<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateRequest;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create() 
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateRequest $request)
    {
        $result = $this->menuService->create($request);

        return redirect()->back();
    }
}
