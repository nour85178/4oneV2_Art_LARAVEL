<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = ModelsRequest::all();
        return view('admin.Request.index', compact('requests'));
    }
    public function show($id)
    {
        $request = ModelsRequest::findorFail($id);
        return view('admin.Request.show', compact('request'));
    }
    public function create()
    {
        return view('admin.Request.create');
    }
    public function store(Request $request)
    {
        ModelsRequest::create($request->all());
        return redirect()->route('requests.index')->with('success', 'Request created successfully');
    }
    public function edit($id)
    {
        $request = ModelsRequest::findOrFail($id);
        return view('admin.Request.edit', compact('request'));
    }
    public function update(Request $request, $id)
    {
        $requestM = ModelsRequest::findOrFail($id);
        $requestM->update($request->all());
        return redirect()->route('requests.index')->with('success', 'Request updated successfully');
    }

    public function delete(Request $request, $id)
    {
        $requestM = ModelsRequest::findOrFail($id);
        $requestM->delete();
        return redirect()->route('requests.index')->with('success', 'Request created successfully');
    }
}
