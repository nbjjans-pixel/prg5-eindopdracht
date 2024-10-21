<!DOCTYPE html>
<html>
<head>
    <title>Voeg een nieuw huis toe</title>
</head>
<x-app-layout>
<body>
<h1>Voeg een nieuw huis toe</h1>
<form action="{{ route('house.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Straatnaam en nummer:</label>
        <input type="text" name="title" id="title" required>
    </div>
    <div>
        <label for="description">Beschrijving:</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <label for="price">Prijs:</label>
        <input type="number" name="price" id="price" required>
    </div>
    <div>
        <label for="type">Type:</label>
        <select name="type" id="type" required>
            <option value="huur">Huur</option>
            <option value="koop">Koop</option>
        </select>
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="1">Actief</option>
            <option value="0">Inactief</option>
        </select>
    </div>
    <div>
        <label for="location">Provincie:</label>
        <input type="text" name="location" id="location" required>
    </div>
    <div>
        <label for="image">Afbeelding URL:</label>
        <input type="text" name="image" id="image" required>
    </div>
    <div>
        <label for="category_id">category_id_aanpassen:</label>
        <input type="number" name="category_id" required>
    </div>
    <div>
        <button type="submit">Huis toevoegen</button>
    </div>
</form>
</body>
    </x-app-layout>
</html>
