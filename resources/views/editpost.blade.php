<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/news/{{ $post->id }}/update" method="post">
        @csrf
        @method('PUT')
        <label>Title</label>
        <input type="text" name="news_title" value="{{ $post->news_title }}">
        <br>
        <label>Link</label>
        <input type="text" name="news_link" value="{{ $post->news_link }}">
        <br>
        <label>Description</label>
        <textarea name="news_description" cols="30" rows="10">{{ $post->news_description }}</textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
