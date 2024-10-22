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
    <p><strong>Beschrijving:</strong> {{ $house->description }}</p>
    <p><strong>Prijs:</strong> {{ $house->price }}</p>
    <p><strong>Type:</strong> {{ $house->type }}</p>
    <p><strong>Status:</strong> {{ $house->status }}</p>
    <p><strong>Provincie:</strong> {{ $house->location }}</p>

    <h2>Reviews</h2>
    <ul>
        @foreach($house->reviews as $review)
            <li>
                <strong>Beoordeling:</strong> {{ $review->rating }}/5 <br>
                <strong>Review:</strong> {{ $review->review }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('reviews.create', $house->id) }}">Schrijf een review</a>

    <a href="{{ route('houses.list') }}">Terug naar huizen</a>
    </body>
</x-app-layout>
</html>
