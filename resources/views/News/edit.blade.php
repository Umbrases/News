<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{ route('news.update', $news->id) }}" method="post">
    @csrf
    @method('patch')
    <input name="title" type="text" value="{{ $news->title }}" placeholder="Название">
    <input name="description" type="text" value="{{ $news->description }}" placeholder="Описание">
    <button type="submit">Изменить</button>
</form>


</body>
</html>
