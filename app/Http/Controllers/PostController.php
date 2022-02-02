<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Post/Index');
    }

    public function create(Request $request)
    {
        return Inertia::render('Post/Form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);


        Post::create($request->all());

        return Inertia::render('Post/Index');
    }


}
