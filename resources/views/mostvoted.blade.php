<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($most_voted as $item)
        <div>
            <h1><a href="{{ $item->news_link }}">{{ $item->news_title }}</a></h1>
            <span>{{ $item->num_upvotes }}</span>
            <a href="/news/{{ $item->id }}/upvote">Upvote</a>
            <a href="/news/{{ $item->id }}/downvote">Downvote</a>
            <a href="/news/{{ $item->id }}">Comments</a>
            <span>Created: {{ $item->created_at }}</span>
        </div>
    @endforeach
</body>
</html>
