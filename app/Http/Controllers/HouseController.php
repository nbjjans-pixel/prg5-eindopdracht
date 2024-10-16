<?php
namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{

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









//namespace App\Http\Controllers;
//
//use App\Models\House;
//use Illuminate\Http\Request;
//
//class HouseController extends Controller
//{
//    public function index()
//    {
//        //normaal halen we informatei uit de database! dus niet -> enzo (wel voor store ofzo)
//        $house = House::all();
//
//
//        return view('house.index', compact('house'));
//    }
//}
