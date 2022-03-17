<?php

namespace App\Http\Controllers;

use App\Navigation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class NavigationController extends Controller
{
    public function table()
    {
        $navigations = Navigation::whereNotNull('url')->get();
        return view('navigation.table', compact('navigations'));
    }

    public function create()
    {
        $permissions = Permission::get();
        $navigations = Navigation::where('url', null)->get(); // Hanya menampilkan navigation yang tidak memiliki URL alias parent (tidak memiliki children)

    return view('navigation.create', compact('permissions', 'navigations'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'permission_name' => 'required',
        ]);

        Navigation::create([
            'name' => request('name'),
            'url' => request('url') ?? null,
            'parent_id' => request('parent_id') ?? null,
            'permission_name' => request('permission_name'),
        ]);

        return back();
    }
}
