<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $users = User::factory()->create();
        $categories = Category::factory()->create();

        $posts = Post::factory()->create([
            'user_id' => $users->id,
            'category_id' => $categories->id
        ]);

        Comment::factory()->create([
            'user_id' => $users->id,
            'post_id' => $posts->id
        ]);
    }
}
