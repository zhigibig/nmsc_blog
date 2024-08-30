<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id');
        $articles = Article::pluck('id');

        Comment::factory()->count(100)->make()->each(function ($comment) use ($users, $articles) {
            $comment->user_id = $users->random();
            $comment->article_id = $articles->random();
            $comment->save();
        });
    }
}
