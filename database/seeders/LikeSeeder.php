<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run(): void
    {
        $articles = Article::all();
        $userIds = User::pluck('id');

        $articles->each(function ($article) use ($userIds) {
            $randomUsers = $userIds->random(rand(1, 7))->toArray();
            $article->likes()->attach($randomUsers);
        });
    }
}
