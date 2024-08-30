@extends('layouts.base')

@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .article-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .article-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #777;
        }

        .article-meta span {
            margin-right: 10px;
        }

        .article-meta i {
            margin-right: 5px;
        }

        .tags {
            margin-bottom: 20px;
        }

        .tag {
            display: inline-block;
            background-color: #e9ecef;
            color: #495057;
            border-radius: 12px;
            padding: 5px 10px;
            margin-right: 5px;
            font-size: 14px;
        }

        .article-text {
            font-size: 18px;
            line-height: 1.6;
        }

        .comment-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .comment-form .form-group {
            margin-bottom: 15px;
        }

        .comment-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .comment-form .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-form .form-control::placeholder {
            color: #adb5bd;
        }

        .comment-form .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .comment-form .btn:hover {
            background-color: #0056b3;
        }

        .comments {
            margin-bottom: 20px;
        }

        .comment {
            margin-top: 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .like-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .like-button:hover {
            background-color: #0056b3;
        }

        .like-button:active {
            transform: scale(0.95);
        }

        .like-button span {
            margin-right: 10px;
            font-weight: bold;
        }
    </style>
@endsection

@section('content')
    <div class="article-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('Форма отправилась успешно') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="article-title">{{ $article->title }}</div>
        <div class="article-meta">
            <span><i class="fas fa-eye"></i>👀 {{ $article->views }}</span>
        </div>

        <div class="tags">
            @foreach ($article->tags as $tag)
                <span class="tag">#{{ $tag->name }}</span>
            @endforeach
        </div>

        <img src="{{ $article->image }}" alt="Image">

        <div class="article-text">
            {{ $article->text }}
        </div>

            <button id="like-btn" data-article="{{ $article->id }}" class="like-button">
                <span id="likes-count">{{ count($article->likes) }}</span> ❤️
            </button>

    </div>
    @include('layouts.comment_form')
    <div class="comments">
        <h2>Comments</h2>
        @foreach ($article->comments as $comment)
            <div class="comment">
                <h4>{{ $comment->title }}</h4>
                <p>{{ $comment->text }}</p>
                <p>Posted by: {{ $comment->user->name }}</p>
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script>
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                fetch('{{ url('/api/articles/' . $article->id . '/increment-views') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({})
                })
                    .then(response => response.json())
                    .then(data => console.log(data.message))
                    .catch(error => console.error('Error:', error));
            }, 5000);
        });

        document.getElementById('like-btn').addEventListener('click', function() {
            const articleId = this.dataset.article;
            fetch(`/api/articles/${articleId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
                .then(response => response.json())
                .then(data => console.log(data.message))
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
