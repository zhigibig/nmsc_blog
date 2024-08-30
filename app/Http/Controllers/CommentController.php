<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:64',
            'comment' => 'required|max:2048',
        ]);

        $comment = new Comment();
        $comment->title = $validatedData['title'];
        $comment->text = $validatedData['comment'];
        $comment->user_id = User::inRandomOrder()->first()->id;
        $comment->article_id = $request->input('article_id');

        $comment->save();

        return redirect()->back()->with('success', 'Комментарий добавлен успешно!');
    }
}
