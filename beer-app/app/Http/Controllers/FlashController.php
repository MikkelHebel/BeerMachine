<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlashController extends Controller
{
    public function Notify(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string'
        ]);

        session()->flash('notify', $validated['message']);

        return response()->json(['success' => true]);
    }
}
