<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function placeBid(Request $request, Product $product)
    {
        $user = auth()->user();
        $currentBidAmount = $product->currentBidAmount();

        $request->validate([
            'amount' => 'required|numeric|min:' . ($currentBidAmount + 1),
        ]);

        if ($request->input('amount') <= $currentBidAmount) {
            return redirect()
                ->back()
                ->with('error', 'Your bid amount must be higher than the current highest bid of $currentBidAmount.')
                ->withInput(); // To retain the user's input in the form

        }

        $bid = Bid::where('user_id', $user->id)->where('product_id', $product->id)->latest()->first();

        if ($bid) {
            $bid->update(['amount' => $request->input('amount')]);
            $product->update(['price' => $request->input('amount')]);
        } else {
            Bid::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'amount' => $request->input('amount'),
            ]);
        }

        return redirect()->back()->with('success', 'Bid placed successfully.');
    }

    public function participate(Product $product)
    {
        $user = auth()->user();

        if (!$user->participations()->where('product_id', $product->id)->exists()) {
            $bid = Bid::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'amount' => 0,
            ]);
            $user->participations()->create([
                'product_id' => $product->id,
                'bid_id' => $bid->id,
            ]);
        }

        return redirect()->back()->with('success', 'You are now participating in the bid for this product.');
    }

    public function showBiddingInterface()
    {
        return view('FrontClient.bids'); // Load the Blade template
    }
}
