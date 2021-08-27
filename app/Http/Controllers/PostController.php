<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //Show all post to the index page
    public function all(){
        $posts = Post::latest()->filter(request(['search','category', 'author']))->paginate(6)->withQueryString();

        return view('post.index', [
            'posts' => $posts,
            'currentCategory' => Category::firstWhere('slug', request('category')),
            'categories' => Category::all()
        ]);
    }

    //Show single post
    public function show(Post $post){

        return view('post.post', [
            'post' => $post
        ]);
    }

}
