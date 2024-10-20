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

                <!-- edit -->
                <a href="{{ route('houses.edit', $house->id) }}">Bewerken</a>

                <!-- delete -->
                <form action="{{ route('houses.destroy', $house->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Weet je zeker dat je dit huis wilt verwijderen?')">Verwijderen</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('home') }}">Terug naar home</a>
    </body>
</x-app-layout>
</html>
