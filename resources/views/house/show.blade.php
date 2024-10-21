<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details page</title>
</head>
<x-app-layout>
<body>
<h1>{{ $house->title }} Details</h1>
<p><strong>ID:</strong> {{ $house->id }}</p>
<p><strong>Description:</strong> {{ $house->description }}</p>
<p><strong>Price:</strong> {{ $house->price }}</p>
<p><strong>Type:</strong> {{ $house->type }}</p>
<p><strong>Status:</strong> {{ $house->status }}</p>
<p><strong>Provincie:</strong> {{ $house->location }}</p>

<a href="{{ route('houses.list') }}">Back to List</a>
</body>
    </x-app-layout>
</html>
