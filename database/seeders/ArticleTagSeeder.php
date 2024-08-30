<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    public function run(): void
    {
        $articles = Article::all();
        $tagIds = Tag::pluck('id');

        $articles->each(function ($article) use ($tagIds) {
            $randomTags = $tagIds->random(rand(1, 7))->toArray();
            $article->tags()->attach($randomTags);
        });
    }
}
