<div class="card">
    <a href="/articles/{{ $article->slug }}" style="display: block; height: 100%; width: 100%;">
    <img src="{{ $article->image }}" alt="Image">
    </a>
    <div class="tags">
        @foreach ($article->tags as $tag)
            <span class="tag">#{{ $tag->name }}</span>
        @endforeach
    </div>
    <a href="/articles/{{ $article->slug }}" style="display: block; height: 100%; width: 100%;">
    <div class="card-body">
        <h3>{{ $article->title }}</h3>
        <p>{{ Str::limit($article->text, 150) }}</p>
    </div>
    <div class="card-footer">
        <span>views: {{ $article->views }}</span>
        <span>❤️ {{ count($article->likes) }}</span>
    </div>
    </a>
</div>
