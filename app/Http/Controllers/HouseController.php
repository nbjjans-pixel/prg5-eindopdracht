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
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add a house.');
        }

        // Validate the input fields
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required',
            'status' => 'required',
            'location' => 'required',
             'category_id' => 'required'
        ]);

        // Create a new House instance
        $house = new House();
        $house->user_id = auth()->id(); // Get the authenticated user ID
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

