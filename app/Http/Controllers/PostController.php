<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts');
    }

    public function create()
    {
        return view('tambah-posts');
    }

        public function edit()
    {
        return view('edit-posts');
    }
}
