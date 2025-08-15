<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        $komentars = Komentar::with(['post', 'user'])->get();
        return view('komentar.index', [
            'komentars' => $komentars,
        ]);
    }
    public function create()
    {
        return view('komentar.create', [
            'posts' => Post::all(),
            'users' => User::whereDoesntHave('komentar')->get(),
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'user_id' => ['required', 'exists:users,id'],
            'isi' => ['required', 'string']
        ], [
            'post_id.required' => 'Pilih post dulu oi!',
            'post_id.exists' => 'Post tidak ada oi!',
            'user_id.required' => 'Pilih User dulu oi!',
            'user_id.exists' => 'User tidak ada oi!',
            'isi.required' => 'Isi komentar tidak boleh kosong!',
            'isi.string' => 'Isi komentar harus berupa teks!'
        ]);

        Komentar::create($request->all());
        return redirect()->route('komentar.index');
    }

    public function show(Komentar $komentar)
    {
        return view('komentar.show', [
            'komentar' => $komentar,
        ]);
    }

    public function edit(Komentar $komentar)
    {
        return view('komentar.edit', [
            'posts' => Post::all(),

            'users' => User::where('id', $komentar->user_id)
                ->orWhereDoesntHave('komentar')
                ->get(),
            'komentar' => $komentar

        ]);
    }

    public function update(Request $request, Komentar $komentar)
    {
        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'user_id' => ['required', 'exists:users,id'],
            'isi' => ['required', 'string']
        ], [
            'post_id.required' => 'Pilih post dulu oi!',
            'post_id.exists' => 'Post tidak ada oi!',
            'user_id.required' => 'Pilih User dulu oi!',
            'user_id.exists' => 'User tidak ada oi!',
            'isi.required' => 'Isi komentar tidak boleh kosong!',
            'isi.string' => 'Isi komentar harus berupa teks!'
        ]);
        $komentar->update($request->all());
        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil diperbarui!');
    }

    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dihapus!');
    }
}
