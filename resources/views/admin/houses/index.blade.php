<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Huizen</title>
</head>
<body>
<h1>Beheer Huizen</h1>
<table>
    <thead>
    <tr>
        <th>locatie</th>
        <th>provincie</th>
        <th>Prijs</th>
        <th>Status</th>
        <th>Acties</th>
    </tr>
    </thead>
    <tbody>
    @foreach($houses as $house)
        <tr>
            <td>{{ $house->title }}</td>
            <td>{{ $house->location }}</td>
            <td>{{ $house->price }}</td>
            <td>
                <form action="{{ route('admin.houses.update', $house->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{ $house->status ? 0 : 1 }}">
                    <button type="submit">{{ $house->status ? 'Deactiveer' : 'Activeer' }}</button>
                </form>
            </td>
            <td>
                <a href="{{ route('admin.houses.edit', $house->id) }}">Bewerken</a>
                <form action="{{ route('admin.houses.destroy', $house->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Weet je zeker dat je dit huis wilt verwijderen?')">Verwijderen</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<a href="{{ route('home') }}">Terug naar home</a>
</body>
</html>
