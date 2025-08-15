<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $posts = Post::orderByDesc('id')->get();
        $user = User::get();
        return view('users.index', [
            'pengguna' => $user
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ],[
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah digunakan pengguna lain!'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('users.index');
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'pengguna' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
        ], [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah digunakan pengguna lain!'
        ]);

        $user = User::find($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
