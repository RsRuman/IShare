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

    //Admin section create post
    public function create(){
        return view('post.create', [
            'categories' => Category::all()
        ]);
    }

    //Store post to database
    public function store(Request $request){

//      $path = $request->file('thumbnail')->store('thumbnails');
//      return 'done '.$path;

        $request->validate([
            'title' => 'required|min:10|max:100',
            'thumbnail' => 'required',
            'excerpt' => 'required|min:100',
            'body' => 'required|min:200',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnails' => $request->file('thumbnail')->store('thumbnails'),
            'slug' => STR::slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body
        ]);

        return redirect('/')->with('success', 'Post created successfully!');
    }
}
