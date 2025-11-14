<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
            $resource = Resource::all();
            return view('resource.index', compact('resource'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
            return view('planta.create');
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
            $resource = new Resource();
            $resource->nome = $request->nome;
            $resource->save();

            return redirect()->route('resource.index');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
            $resource = Resource::find($id);

            if(isset($resource)) {
                return view('resource.show', compact('resource'));
            }

            return redirect()->route('resource.index');
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*
            $resource = Resource::find($id);

            if(isset($resource)) {
                return view('resource.edit', compact('resource'));
            }

            return redirect()->route('resource.index');
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
            $resource = Resource::find($id);

            if(isset($resource)) {
                $resource->nome = $request->nome;
                $resource->save();
            }

            return redirect()->route('resource.index');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
            $resource = Resource::find($id);

            if(isset($resource)) {
                $resource->delete();
            }

            return redirect()->route('resource.index');
        */
    }
}
