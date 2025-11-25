<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Batch;

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
        $Batchone = Batch::where("type_id", 1)->get();
        $Batchtwo = Batch::where("type_id", 2)->get();
        $Batchthree = Batch::where("type_id", 3)->get();
        $Batchfour = Batch::where("type_id", 4)->get();
        $Batchfive = Batch::where("type_id", 5)->get();
        $Batchsix = Batch::where("type_id", 6)->get();
        return view('pages.statistics')
            ->with('types', $types)
            ->with('batchone', $Batchone)
            ->with('batchtwo', $Batchtwo)
            ->with('batchthree', $Batchthree)
            ->with('batchfour', $Batchfour)
            ->with('batchfive', $Batchfive)
            ->with('batchsix', $Batchsix);

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
