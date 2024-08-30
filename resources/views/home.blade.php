@extends('layouts.base')

@section('title', 'Home Page')

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

@section('content')
    <div class="container">
        <h1>Welcome to NMSC BLOG!</h1>
    </div>

    @foreach($articles as $article)
        @include('layouts.article_mini')
    @endforeach
@endsection
