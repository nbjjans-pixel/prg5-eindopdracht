<?php
namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HouseController extends Controller
{

    public function create(){
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

    // Methode voor het opslaan van de wijzigingen
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required'
        ]);

        $house = House::find($id);
        $house->title = $request->input('title');
        $house->description = $request->input('description');
        $house->price = $request->input('price');
        $house->type = $request->input('type');
        $house->status = $request->input('status');
        $house->location = $request->input('location');
        $house->image = $request->input('image') ?? $house->image; // Behoud de oude afbeelding als geen nieuwe wordt opgegeven
        $house->updated_at = Date::now();

        $house->save();

        return redirect()->route('houses.list');
    }


    public function listTitles()
    {
        $houses = House::all();
        return view('house.list', compact('houses'));
    }

    public function show($id)
    {
        $house = House::find($id);
        return view('house.show', compact('house'));
    }

}

