<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Type;

class PageController extends Controller
{
    public function home()
    {
        $types = Type::all();
        return view('pages.home')->with('types', $types);;
    }

    public function production()
    {
        $types = Type::all();
        return view('pages.production')->with('types', $types);
    }

    public function status()
    {
        return view('pages.status');
    }

    public function statistics()
    {
        return view('pages.statistics');
    }

    public function admin() {
        $users = User::latest()->get();
        return view('pages.admin', compact('users'));
    }

    public function settings()
    {
        return view('pages.settings');
    }
}
