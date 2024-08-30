<form action="/api/comment" method="POST" class="comment-form">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article->id }}">
    <div class="form-group">
        <label for="title">Оставить комментарий</label>
        <input
            type="text"
            id="title"
            name="title"
            class="form-control"
            maxlength="64"
            required
            placeholder="Тема сообщения (Максимальная длина 64 символа)"
            value="{{ old('title') }}">
        @error('title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <textarea
            id="comment"
            name="comment"
            class="form-control"
            maxlength="2048"
            required
            rows="4"
            placeholder="Сообщение (Максимальная длина 2048 символов)">{{ old('comment') }}</textarea>
        @error('comment')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
