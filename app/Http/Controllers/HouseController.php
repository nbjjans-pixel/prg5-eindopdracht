<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        //normaal halen we informatei uit de database! dus niet -> enzo
        $house = House::all();


        return view('house.index', compact('house'));
    }
}
