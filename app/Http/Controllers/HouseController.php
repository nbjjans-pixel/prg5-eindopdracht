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

        // Error ligt in het checken of de gebruiker is ingelogd
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required'
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

        $house->created_at = Date::now();
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

