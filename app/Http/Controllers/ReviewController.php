<?php

namespace App\Http\Controllers;
use App\Models\Review;


use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews.index');
    }
    public function create()
    {
        return view('reviews.create');
    }

    public function show(string $id)
    {
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }
}
