<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House Titles</title>
</head>
<body>
    <h1>House Titles</h1>
    <a href="{{ route('house.create') }}">Voeg een nieuw huis toe</a>
    <ul>
        @foreach($houses as $house)
            <li>
                <a href="{{ route('houses.show', $house->id) }}">
                    {{ $house->title }}
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('home') }}">Back home</a>
</body>
</html>
