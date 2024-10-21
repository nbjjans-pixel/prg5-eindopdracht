 <h1>Huis aanpassen</h1>

    <form action="{{ route('house.update', $house->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- <-Nodig bij update form in Laravel-->

        <div>
            <label for="title">Straatnaam en nummer:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $house->title) }}" required>
        </div>

        <div>
            <label for="description">Beschrijving</label>
            <textarea id="description" name="description" required>{{ old('description', $house->description) }}</textarea>
        </div>

        <div>
            <label for="price">Prijs</label>
            <input type="text" id="price" name="price" value="{{ old('price', $house->price) }}" required>
        </div>

        <div>
            <label for="type">Type</label>
            <input type="text" id="type" name="type" value="{{ old('type', $house->type) }}" required>
        </div>

        <div>
            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="{{ old('status', $house->status) }}" required>
        </div>

        <div>
            <label for="location">Provincie:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $house->location) }}" required>
        </div>

        <div>
            <label for="image">Afbeelding URL</label>
            <input type="text" id="image" name="image" value="{{ old('image', $house->image) }}">
        </div>

        <button type="submit">Huis Bijwerken</button>
    </form>

    <a href="{{ route('houses.list') }}">Terug naar huizenlijst</a>
