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
        $review= Review::findorFail($id);
        return view('admin.Review.show', compact('review'));

    }
    public function create()
{
    return view('admin.Review.create');
}
    public function store(Request $request){
        return Review::create($request->all());
    }
    public function edit($id)
{
    $review = Review::findOrFail($id);
    return view('admin.Review.edit', compact('review'));
}
public function update(Request $request, $id)
{
    $review = Review::findOrFail($id);
    $review->update($request->all());
    return redirect()->route('reviews.index')->with('success', 'Review updated successfully');
}

    public function delete(Request $request, $id){
        $review = Review::findOrFail($id);
        $review->delete();
        return 204;
    }

}
