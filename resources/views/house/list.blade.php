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

    <!-- zoek-->
    <form action="{{ route('houses.list') }}" method="GET">
        <input type="text" name="search" placeholder="Zoek op titel" value="{{ request('search') }}">
        <button type="submit">Zoeken</button>
    </form>

    <ul>
        @foreach($houses as $house)
            <li>
                <a href="{{ route('houses.show', $house->id) }}">
                    {{ $house->title }}
                </a>

                @if(auth()->user() && auth()->user()->favorites->contains($house->id))
                    <form action="{{ route('houses.unfavorite', $house->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove from Favorites</button>
                    </form>
                @else
                    <form action="{{ route('houses.favorite', $house->id) }}" method="POST">
                        @csrf
                        <button type="submit">Add to Favorites</button>
                    </form>
                @endif
            </li>
            @endforeach


            {{--                <!-- edit -->--}}
{{--                @if(auth()->user() && auth()->user()->status == 1)--}}
{{--                <a href="{{ route('houses.edit', $house->id) }}">Bewerken</a>--}}

{{--                <!-- delete -->--}}
{{--                <form action="{{ route('houses.destroy', $house->id) }}" method="POST" style="display:inline;">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" onclick="return confirm('Weet je zeker dat je dit huis wilt verwijderen?')">Verwijderen</button>--}}
{{--                </form>--}}
{{--                @endif--}}
    </ul>

    <a href="{{ route('home') }}">Terug naar home</a>
    </body>
</x-app-layout>
</html>
