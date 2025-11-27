<?php

namespace App\Http\Controllers;
use App\Models\User;

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
        $batchOne = Batch::where("type_id", 1)->get();
        $batchTwo = Batch::where("type_id", 2)->get();
        $batchThree = Batch::where("type_id", 3)->get();
        $batchFour = Batch::where("type_id", 4)->get();
        $batchFive = Batch::where("type_id", 5)->get();
        $batchSix = Batch::where("type_id", 6)->get();
        return view('pages.statistics')
            ->with('types', $types)
            ->with('batchOne', $batchOne)
            ->with('batchTwo', $batchTwo)
            ->with('batchThree', $batchThree)
            ->with('batchFour', $batchFour)
            ->with('batchFive', $batchFive)
            ->with('batchSix', $batchSix);
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
