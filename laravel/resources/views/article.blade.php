<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>
<body>
    @if(empty($article))
        <h1>ERROR 404! Статья не найдена</h1>
    @else
        <ul>
            <li>{{$article->name}}</li>
            <li>{{$article->code}}</li>
            <li>{{$article->content}}</li>
            <li>{{$article->author}}</li>
        </ul>
        @foreach($tags as $tag)
            <ul>
                <li>{{$tag->name}}</li>
                <li>{{$tag->code}}</li>
            </ul>
        @endforeach
    @endif
</body>
</html>
