<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function create()
    {
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
            return redirect()->route('admin.houses.index')->with('error', 'Huis niet gevonden.');
        }

        // Wijzig de status van het huis
        $house->status = $request->input('status');
        $house->save();

        return redirect()->route('admin.houses.index')->with('success', 'Status succesvol bijgewerkt.');
    }

    public function listTitles(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $houses = House::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->where('status', 1)
            ->get();

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
