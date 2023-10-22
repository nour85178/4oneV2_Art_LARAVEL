<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Tag;
use App\Models\Product;


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
        $tags = Tag::all(); // Assuming you have a "Tag" model for tags
        return view('admin.Review.create', compact('tags'));
    }
    public function test()
    {
        return view('admin.Review.review');
    }
    public function store(Request $request) {
        $review = new Review($request->except('tags'));

        // Save the review
        $review->save();

        // Attach the selected tags to the review
        $review->tags()->attach($request->input('tags'));

        return redirect()->route('reviews.index')->with('success', 'Review created successfully');
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);

        $tags = Tag::all();
        return view('FrontClient.editReviewForm', compact('review', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->note = $request->input('note');
        $review->update($request->all());

        return response()->json(['message' => 'Review updated successfully']);
    }



    public function delete(Request $request, $id){
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review Deleted successfully');
    }
    public function tagsChart()
    {
        $tags = Tag::all();
        $tagCounts = [];

        foreach ($tags as $tag) {
            $tagCounts[] = $tag->reviews()->count();
        }

        return view('admin.dashboard.tags_chart', compact('tags', 'tagCounts'));
    }
    public function combinedCharts()
    {
        $tags = Tag::all();
        $tagCounts = [];

        foreach ($tags as $tag) {
            $tagCounts[] = $tag->reviews()->count();
        }

        $products = Product::with(['review' => function ($query) {
            $query->select('product_id', \DB::raw('AVG(note) as average_note'))
                ->whereBetween('note', [0, 5])
                ->groupBy('product_id');
        }])->get();

        return view('admin.dashboard.charts', compact('tags', 'tagCounts', 'products'));
    }
    public function averageNoteChart()
    {
        $products = Product::with(['review' => function ($query) {
            $query->select('product_id', \DB::raw('AVG(note) as average_note'))
                ->whereBetween('note', [0, 5])
                ->groupBy('product_id');
        }])->get();

        return view('admin.dashboard.average_note_chart', compact('products'));
    }

}
