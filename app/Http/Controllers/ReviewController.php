<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.Review.index', compact('reviews'));
    }
    public function show($id){
        return Review::findorFail($id);
    }
    public function create()
{
    return view('admin.Review.create');
}
    public function store(Request $request){
        return Review::create($request->all());
    }
    public function update(Request $request, $id){
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return $review;
    }
    public function delete(Request $request, $id){
        $review = Review::findOrFail($id);
        $review->delete();
        return 204;
    }

}
