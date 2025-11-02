<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Planta;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plantas = Planta::all();
        return view('planta.index', compact('plantas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('planta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $planta = new Planta();
        $planta->nome = $request->nome;
        $planta->tipo = $request->tipo;
        $planta->descricao = $request->descricao;
        $planta->save();

        return redirect()->route('planta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            return view('planta.show', compact('planta'));
        }

        return redirect()->route('planta.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            return view('planta.edit', compact('planta'));
        }

        return redirect()->route('planta.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            $planta->nome = $request->nome;
            $planta->tipo = $request->tipo;
            $planta->descricao = $request->descricao;
            $planta->save();   
        }

        return redirect()->route('planta.index');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            $planta->delete();
        }

        return redirect()->route('planta.index');
    }
}
