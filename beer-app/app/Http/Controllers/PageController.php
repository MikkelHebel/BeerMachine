<?php

namespace App\Http\Controllers;

use App\Models\Type;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
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

    public function admin()
    {
        return view('pages.admin');
    }

    public function settings()
    {
        return view('pages.settings');
    }
}
