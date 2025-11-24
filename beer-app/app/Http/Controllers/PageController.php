<?php

namespace App\Http\Controllers;

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
        $types = Type::all();
        return view('pages.statistics')->with('types', $types);
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
