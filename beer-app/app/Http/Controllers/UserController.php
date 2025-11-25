<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create() {
        return view('pages.createUser');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string',
            'is_admin' => 'nullable|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return redirect()->route('admin')->with('notify', 'Account Created!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('pages.editUser', ['user' => $user]);
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'nullable|string',
            'is_admin' => 'nullable|boolean',
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
