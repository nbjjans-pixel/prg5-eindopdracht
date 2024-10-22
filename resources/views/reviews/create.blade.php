<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Schrijf een review</title>
</head>
<x-app-layout>
    <body>
    <h1>Schrijf een review voor {{ $house->title }}</h1>

    <form action="{{ route('reviews.store', $house->id) }}" method="POST">
        @csrf
        <div>
            <label for="review">Review</label>
            <textarea id="review" name="review" required></textarea>
        </div>
        <div>
            <label for="rating">Beoordeling</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            /5
        </div>
        <button type="submit">Review toevoegen</button>
    </form>

    <a href="{{ route('houses.show', $house->id) }}">Terug naar {{ $house->title }}</a>
    </body>
</x-app-layout>
</html>
