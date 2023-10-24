<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RequestController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        $requests = $user->requests;

        return view('FrontClient.requests-list', compact('requests'));
    }

    public function displayArtistRequests()
    {

        $user = Auth::user();


        $requests = ModelsRequest::where('artist_id', $user->id)->get();

        return view('FrontArtiste.artist-requests', compact('requests'));
    }
    public function show($id)
    {
        $request = ModelsRequest::findorFail($id);
        return view('admin.Request.show', compact('request'));
    }
    public function showCustomProduct(ModelsRequest $request)
    {
        return view('FrontClient.show-custom-product', compact('request'));
    }
    public function create(User $artist)
    {
        return view('FrontClient.create-request', compact('artist'));
    }
    public function store(Request $request, $artist)
    {
        $request->validate([

            'description' => 'required',
            'image' => 'required|image',
            'categorie' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('public/images', $request->file('image')->getClientOriginalName());
            $imagePath = str_replace('public/', '', $imagePath);
        }

        $user = Auth::user();
        $artistt = User::find($artist);
        $requestInstance = new ModelsRequest();
        $requestInstance->description = $request->input('description');
        $requestInstance->categorie = $request->input('categorie');
        $requestInstance->image = $imagePath;
        $requestInstance->user()->associate($user);
        $requestInstance->artist()->associate($artistt);
        $requestInstance->save();

        return redirect()->route('requests-list')->with('success', 'Request created successfully');
    }
    public function edit($id)
    {
        $request = ModelsRequest::findOrFail($id);
        return view('admin.Request.edit', compact('request'));
    }

    public function acceptRequest(ModelsRequest $request)
    {
        $request->etat = 'en cours';
        $request->save();

        return redirect()->route('artist-requests')->with('success', 'Request accepted successfully');
    }

    public function deleteRequest(ModelsRequest $request)
    {
        $request->delete();

        return redirect()->route('artist-requests')->with('success', 'Request deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $requestM = ModelsRequest::findOrFail($id);
        $requestM->update($request->all());
        return redirect()->route('requests.index')->with('success', 'Request updated successfully');
    }
}
