<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>House Titles</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<x-app-layout>
    <body class="bg-gray-100 flex flex-col items-center py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Huizenlijst</h1>

    <!-- geeft de foutmelding weer op de pagina met de with->('aangegeven fout') in de controller-->
    @if(session('error'))
        <div class="mb-4 px-4 py-2 bg-red-500 text-white rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Voeg nieuw huis toe -->
    <a href="{{ route('house.create') }}" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
        Voeg een nieuw huis toe
    </a>

    <form action="{{ route('houses.list') }}" method="GET" class="flex mb-6 w-full max-w-md">
        <input
                type="text"
                name="search"
                placeholder="Zoek op titel"
                value="{{ request('search') }}"
                class="flex-grow px-4 py-2 border rounded-l-md border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        <!-- Dropdown voor aantal huizen -->
        <select name="category_id" class="mx-2 px-4 py-2 border rounded border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Aantal kamers</option>
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" {{ request('category_id') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>

        <!-- Checkbox voor alleen favorieten -->
        <label class="flex items-center space-x-2">
            <input type="checkbox" name="favorites_only" value="1" {{ request('favorites_only') ? 'checked' : '' }}>
            <p>Alleen favorieten</p>
        </label>

        <button
                type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 transition duration-200">
            Zoeken
        </button>
    </form>


    <!-- Huizenlijst -->
    <ul class="w-full max-w-2xl space-y-4">
        @foreach($houses as $house)
            <li class="flex items-center justify-between bg-white p-4 rounded-lg shadow-md">

                <!-- Huis titel -->
                <a href="{{ route('houses.show', $house->id) }}" class="text-lg font-semibold text-gray-800 hover:text-blue-500 transition">
                    {{ $house->title }}
                </a>
                <!-- Link om huis aan te passen -->
                @if(auth()->user()->id == $house->user_id || auth()->user()->status == 1)
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('houses.edit', $house->id) }}" class="ml-4 px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                            Aanpassen
                        </a>

                        <!-- Delete-knop -->
                        @if(auth()->user()->id == $house->user_id)
                            <form action="{{ route('houses.destroy', $house->id) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button
                                        type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-blue-600 transition duration-200">
                                    Verwijder huis
                                </button>
                            </form>
                        @endif
                    </div>
                @endif

                <!-- Favorieten -->
                <div class="flex items-center space-x-2">
                    @if(auth()->user() && auth()->user()->favorites->contains($house->id))
                        <form action="{{ route('houses.unfavorite', $house->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                    type="submit"
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                                Verwijder uit favorieten
                            </button>
                        </form>
                    @else
                        <form action="{{ route('houses.favorite', $house->id) }}" method="POST">
                            @csrf
                            <button
                                    type="submit"
                                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-200">
                                Voeg toe aan favorieten
                            </button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>



    <!-- Terug naar home link -->
    <a href="{{ route('home') }}" class="mt-8 text-blue-500 hover:underline">
        Terug naar home
    </a>

    </body>
</x-app-layout>
