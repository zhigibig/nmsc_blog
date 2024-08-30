<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function __construct() {}

    public function home()
    {
        return view('home', ['articles' => Article::getLatestArticles()]);
    }

    public function article(Article $article)
    {
        return view('article', ['article' => $article]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(5);
        return view('catalog', ['articles' => $articles]);
    }

    public function incrementViews(Article $article)
    {
        $article->increment('views');
        return response()->json(['message' => 'Количество просмотров успешно увеличено!']);
    }

    public function like(Article $article)
    {
        $like = new Like();
        $like->user_id = (User::factory()->create())->id;
        $like->article_id = $article->id;
        $like->save();

        return response()->json(['message' => 'Лайк добавлен успешно!']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
