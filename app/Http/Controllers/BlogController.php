<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug){
        $post = Post::where('slug','=',$slug)->first();
        return view('project_blog.single')->withPost($post);  
    }
    public function getList() {
        $posts = Post::paginate(5);
        return view('project_blog.index')->withPosts($posts);
    }
}
