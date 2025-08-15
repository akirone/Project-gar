<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderByDesc('id')->get();
        $posts = Post::get();
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
        ], [
            'foto.required' => 'Foto tidak boleh kosong!',
            'foto.image' => 'File harus berupa gambar!',
            'foto.mimes' => 'Format gambar harus jpeg, gif, png, atau jpg!',
            'foto.max' => 'Ukuran gambar maksimal 50MB!',
            'judul.required' => 'Judul tidak boleh kosong!',
            'isi.required' => 'Isi tidak boleh kosong!'
        ]);

        $data = $request->all();

        $data['foto'] = $request->file('foto')->store('posts', 'public');

        Post::create($data);

        return redirect()->route('posts.index');
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', [
            'posts' => $post
        ]);
    }

    public function edit($id)
    {
        // dd($id);
        return view('posts.edit', [
            $post = Post::find($id),
            // dd($post);
            'postingan' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $post = Post::find($id);

        $request->validate([
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($post->foto) {
                Storage::disk('public')->delete($post->foto);
            }
            $data['foto'] = $request->file('foto')->store('posts', 'public');
        } else {
            $data['foto'] = $post->foto;
        }

        $post = Post::where('id', $id)
            ->with('komentars')
            ->first();

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Data Post berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->komentars()->delete();

        if ($post->foto) {
            Storage::disk('public')->delete($post->foto);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Data Post berhasil dihapus!');
    }
}
