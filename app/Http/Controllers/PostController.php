<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function index(Post $post) {
        $posts = $post->get();
        
        return view('post.index', compact('posts'));
    }
}
