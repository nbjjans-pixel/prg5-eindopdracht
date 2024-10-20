<?php
namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{

    public function create(){
        return view('house.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'status' => 'required|string',
            'location' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $house = new House();
        $house->title = $request->title;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->type = $request->type;
        $house->status = $request->status;
        $house->location = $request->location;
        $house->image = $request->image;

        $house->save();

        return redirect()->route('house.list');
    }

    public function listTitles()
    {
        $houses = House::all();
        return view('house.list', compact('houses')); //-> name functie nog toevoegen
    }

    public function show($id)
    {
        $house = House::find($id);
        return view('house.show', compact('house'));
    }

}

