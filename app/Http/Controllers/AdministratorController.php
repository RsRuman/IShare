<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdministratorController extends Controller
{
    public function index(){

        $posts = Post::latest()->get();

        return view('admin.index',[
            'posts' => $posts
        ]);
    }
    //Admin section create post
    public function create(){
        return view('admin.create', [
            'categories' => Category::all()
        ]);
    }
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

    //Admin section create category
    public function createCategory(){
        return view('admin.createCategory');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name' => ['required', 'min:5', 'max:20', Rule::unique('categories', 'name')]
        ]);
        $category = trim( $request->name);
        if (str_contains($category, ' ')){
           $slug = strtolower(Str::slug($category));
        }
        else{
            $slug = strtolower($category);
        }
        Category::create([
            'name' => $category,
            'slug' => $slug
        ]);


        return redirect('/admin/dashboard')->with('success', 'Category Created Successfully!');
    }

    //Admin section user list
    public function user(){
        return view('admin.user', [
            'users' => User::latest()->get()
        ]);
    }

    //Admin section Category List
    public function category(){
        return view('admin.category', [
            'categories' => Category::latest()->get()
        ]);
    }

    //Admin section deleteUser
    public function userDelete(Request $request){
        $id = $request->id;
        User::find($id)->delete();
        return view('admin.user', [
            'users' => User::latest()->get()
        ])->with('success', 'User has been deleted successfully!');
    }
}
