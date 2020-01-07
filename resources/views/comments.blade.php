<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><a href="{{ $post->news_link }}">{{ $post->news_title }}</a></h1>
    <span>{{ $post->num_upvotes }}</span>
    <a href="/news/{{ $post->id }}/upvote">Upvote</a>
    <a href="/news/{{ $post->id }}/downvote">Downvote</a>
    <span>Created: {{ $post->created_at }}</span>
    <div>{{ $post->news_description }}</div>

    <br>
    <a href="/newss/{{ $post->id }}/edit">Edit</a>
    <form action="/news/{{ $post->id }}/delete" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <h4>Comments:</h4>
    @foreach ($comments as $comment)
        <div>{{ $comment->comment_text }}</div>
    @endforeach
    <form action="/news/{{ $post->id }}/comments/new" method="post">
        @csrf
        <label>Username</label>
        <input type="text" name="username">
        <label>Content</label>
        <input type="text" name="comment_text">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
