<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House Titles</title>
</head>
<x-app-layout>
    <body>
    <a href="{{ route('house.create') }}">Voeg een nieuw huis toe</a>
    <ul>
        @foreach($houses as $house)
            <li>
                <!-- list -->
                <a href="{{ route('houses.show', $house->id) }}">
                    {{ $house->title }}
                </a>

                <!-- delete-->
                <form action="{{ route('houses.destroy', $house->id) }}" method="POST" style="display:inline;">
                    @csrf                 <!-- tegen 419 -->
                    @method('DELETE')                <!-- voor laravel om te zien dat het een delete request is -->
                    <button type="submit" onclick="return confirm('Weet je zeker dat je dit huis wilt verwijderen?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('home') }}">Back home</a>
    </body>
</x-app-layout>
</html>
