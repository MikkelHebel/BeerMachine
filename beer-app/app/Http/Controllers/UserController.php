<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

    }

    public function store(Request $request, string $id) {
        $request->validate([
            'name' => 'required|string|255',
            'email' => 'required|string|255',
            'password' => 'required|string',
            'is_admin' => 'required|string',
        ]);

        User::create($request->only(['name', 'email', 'password', 'is_admin']));

        return redirect()->route('admin')->with('notify', 'Account Created!');
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required|string|255',
            'email' => 'required|string|255',
            'password' => 'required|string',
            'is_admin' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'password', 'is_admin']));

        return redirect()->route('admin')->with('notify', 'Account Edited!');
    }

    public function destroy(string $id) {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin')->with('notify', 'Account Deleted!');
    }
}
