<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>
    <form method="get">
        Code:<br>
        <div>
            <input type="text" name="code" id="codeId" value="{{ request()->input('code') }}"><br>
        </div>
        Title:<br>
        <div>
            <input type="text" name="name" id="nameId" value="{{ request()->input('name') }}"><br>
        </div>
        Tag:<br>
        <div>
            <input type="text" name="tag" id="tagId" value="{{ request()->input('tag') }}"><br><br>
        </div>
        <div>
            <button type="submit" >Search</button>
        </div>

    </form>

    @foreach($articles as $article)
    <ul>
        <li>{{$article->name}}</li>
        <li>{{$article->code}}</li>
        <li>{{$article->content}}</li>
        <li>{{$article->author}}</li>
    </ul>
    @endforeach
    {{$articles->withQueryString()->links('pagination::bootstrap-4')}}
</body>
</html>
