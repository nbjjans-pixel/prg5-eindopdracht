<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        $reviewCount = Review::where('user_id', $user->id)->count();
        //count voor test !veranderen!
        if ($reviewCount < 1) {
            return redirect()->route('houses.list') //error wordt doorgegeven in list.blade.php
                ->with('error', 'Je moet minstens één review schrijven voordat je een huis kunt toevoegen.');
        }

        return view('house.create');
    }


    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add a house.');
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
        $house = House::find($id);
        $house->delete();

        return redirect()->route('houses.list');
    }

    public function edit($id)
    {
        $house = House::find($id);
        return view('house.edit', compact('house'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $house = House::find($id);

        if (!$house) {
            return redirect()->route('admin.houses.index');
        }

        // Wijzig de status van het huis
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

        // Filter categorie
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
        $house = House::find($id);
        return view('house.show', compact('house'));
    }

    public function adminIndex()
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
