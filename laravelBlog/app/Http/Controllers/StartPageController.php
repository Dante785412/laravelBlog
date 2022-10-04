<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StartPageController extends Controller
{
    //
    public function index()
    {

        // $posts = Post::all()->sortByDesc('created_at');
        $posts = Post::with('user')->latest()
            ->Active()
            ->limit(5)
            ->get();
        // letzte 5 Beiträge
        // sortiert nach neuste oben
        // als gelöschte markierte sollen ausgeblendet werden

        return view('index', compact('posts'));
    }


    public function show($id)
    {

        $post = Post::findOrFail($id);
        return view('blog/show', compact('post'));
    }
}
