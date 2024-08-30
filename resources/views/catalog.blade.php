@extends('layouts.base')

@section('title', 'Catalog')

@section('styles')
    <style>
        .tag {
            display: inline-block;
            background-color: #e9ecef;
            color: #495057;
            border-radius: 12px;
            padding: 5px 10px;
            margin-right: 5px;
            font-size: 14px;
        }
    </style>
@endsection

@section('styles')
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a {
            display: block;
            padding: 10px 15px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination .active a {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
            cursor: default;
        }

        .pagination .disabled a {
            color: #aaa;
            pointer-events: none;
            border-color: #ddd;
        }
    </style>
@endsection
@section('content')
    <h1>Article Catalog</h1>
    @foreach($articles as $article)
        @include('layouts.article_mini')
    @endforeach

    <div class="pagination">
        {{ $articles->links() }}
    </div>
@endsection
