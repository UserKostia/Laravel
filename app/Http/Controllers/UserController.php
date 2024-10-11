<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $send = [$id, $user];
        return view('users.edit', compact('send'));
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:8',
        ]);

        $data = $request->only(['name', 'email']);
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::with('posts')->find($id);
        $send = [$id, $user];
        return view('users.show', compact('send'));
    }
}
