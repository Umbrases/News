<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<div class="flex gap-2">
    <a href="{{ route('profile') }}" class="rounded-md bg-green-600 py-2 px-4 font-semibold text-white shadow-lg transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Profile</a>
    <form method="post" action="{{ route('logout') }}" class="flex">
        @csrf

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="rounded-md bg-gray-200 py-2 px-4 font-semibold text-gray-900 shadow-lg transition duration-150 ease-in-out hover:bg-gray-300 hover:shadow-xl focus:shadow-xl focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Log Out</a>
    </form>
</div>
<a href="{{ route('welcome') }}">dd</a>
@foreach($news as $new)
    <div>
        <h5>{{ $new->title }}</h5>
        <p>{{ Str::limit($new->description, 170) }}</p>
        <p>{{ $new->created_at }}</p>
        <p>{{ $new->updated_at }}</p>
        <a href="{{ route('news.show', $new->id) }}">Смотреть</a>
    </div>


@endforeach



</body>
</html>
