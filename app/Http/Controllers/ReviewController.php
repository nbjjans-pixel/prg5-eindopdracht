<?php

namespace App\Http\Controllers;
use App\Models\House;
use App\Models\Review;


use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews.index');
    }
    public function create(House $house)
    {
        return view('reviews.create', compact('house'));
    }

    public function show(string $id)
    {
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }
    public function store(Request $request, House $house)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = new Review();
        $review->review = $request->input('review');
        $review->rating = $request->input('rating');
        $review->house_id = $house->id;
        $review->user_id = auth()->id();

        $review->save();

        return redirect()->route('houses.show', $house->id)->with('success', 'Review toegevoegd');
    }
}
