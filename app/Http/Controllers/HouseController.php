<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    //Als de gebruiker minimaal 1 review heeft geschreven krijgt ie de house.create view te zien.
    public function create()
    {
        $user = auth()->user();

        $reviewCount = Review::where('user_id', $user->id)->count();
        //count voor testen verplichte validatie !!!veranderen!!!
        if ($reviewCount < 1) {
            return redirect()->route('houses.list') //error wordt doorgegeven in list.blade.php
                ->with('error', 'Je moet minstens één review schrijven voordat je een huis kunt toevoegen.');
        }

        return view('house.create');
    }


    public function store(Request $request)
    {
        //inlog check, daarna checkt het of of alle velden van de form zijn ingevuld
        //daarna wordt de informatie aan de houses database toegevoegd
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required',
            'category_id' => 'required'
        ]);

        $house = new House();
        $house->user_id = auth()->id();
        $house->title = $request->input('title');
        $house->description = $request->input('description');
        $house->price = $request->input('price');
        $house->type = $request->input('type');
        $house->status = $request->input('status');
        $house->location = $request->input('location');
        $house->image = $request->input('image') ?? 'https://default-image.url';
        $house->category_id = $request->input('category_id');

        // Save the house to the database
        $house->save();

        return redirect()->route('houses.list');
    }

    public function destroy($id)
    {
        //zoek huis op id en (hard)verwijdert het
        $house = House::find($id);
        $house->delete();

        return redirect()->route('houses.list');
    }

    public function edit($id)
    {
        //Controleert of de ingelogde gebruiker dezelfde gebruiker is als de maker van het huis of een admin
        //house.edit wordt weergegeven als door check is gekomen
        $house = House::find($id);

        if (auth()->user()->id != $house->user_id  && auth()->user()->status != 1) {
            return redirect()->route('houses.list')->with('error', 'Je hebt geen toestemming om dit huis te bewerken.');
        }

        return view('house.edit', compact('house'));
    }


    public function update(Request $request, $id)
    {
        //valideert de velden van de form en update de informatie van het huis
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required',
        ]);

        $house = House::find($id);
        $house->title = $request->input('title');
        $house->description = $request->input('description');
        $house->price = $request->input('price');
        $house->type = $request->input('type');
        $house->status = $request->input('status');
        $house->location = $request->input('location');

        $house->save();

        return redirect()->route('houses.list');
    }

    public function updateStatus(Request $request, $id)
    {
        //admin kan de status aanpassen (Gekozen voor apart omdat in update de aanpassing niet werkte terwijl de dd wel de status als verandert aangaf)
        $house = House::find($id);
        $house->status = $request->input('status');
        $house->save();

        return redirect()->route('admin.houses.index');
    }

    public function listTitles(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');
        $favoritesOnly = $request->input('favorites_only');

        $houses = House::query();

        // Zoek
        if ($search) {
            $houses->where('title', 'like', "%{$search}%");
        }

        // Filter categorie (category_id is eigenlijk aantal kamers voor de dropdown)
        // koos ervoor om dit niet aan te passen omdat i kde databases niet weer wilde gaan invullen
        // en functionaliteit bleef hetzelfde alleen het aanpassen van de naam in de views.
        if ($categoryId) {
            $houses->where('category_id', $categoryId);
        }

        // favorieten
        if ($favoritesOnly && auth()->check()) {
            $user = auth()->user();
            $houses->whereIn('id', $user->favorites->pluck('id'));
        }

        // actieve huizen tonen
        $houses->where('status', 1);

        $houses = $houses->get();

        return view('house.list', compact('houses'));
    }


    public function show($id)
    {
        //details van een huis
        $house = House::find($id);
        return view('house.show', compact('house'));
    }

    public function adminIndex() //!Had een admin controller moet aanmaken!
    {
        if (!auth()->check() || auth()->user()->status != 1) {
            return redirect()->route('home'); // naar home als je geen admin bent
        }

        $houses = House::all();
        return view('admin.houses.index', compact('houses'));
    }

    public function favorite($houseId)
    {
        $user = auth()->user();
        $user->favorites()->attach($houseId);

        return redirect()->back();
    }

    public function unfavorite($houseId)
    {
        $user = auth()->user();
        $user->favorites()->detach($houseId);

        return redirect()->back();
    }
}
