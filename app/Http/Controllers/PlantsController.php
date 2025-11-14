<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $plants = Plant::all();
        return view('plant.index', compact('plants'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        return view('plant.create');
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $plant = new Plant();
        $plant->user_id = $request->user_id;; 
        $plant->scientific_name = $request->scientific_name;
        $plant->common_name = $request->common_name;
        $plant->description = $request->description;
        $plant->benefits = $request->benefits;
        $plant->contraindications = $request->contraindications;
        $plant->usage_methods = $request->usage_methods;
        $plant->scientific_references = $request->scientific_references;
        $plant->save();

        return redirect()->route('plant.index')->with('success', 'Planta cadastrada com sucesso!');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
        $plant = Plant::find($id);

        if (isset($plant)) {
           
            return view('plant.show', compact('plant'));
        }

        return redirect()->route('plant.index')->with('error', 'Planta não encontrada.');
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*
        $plant = Plant::find($id);

        if (isset($plant)) {

            return view('plant.edit', compact('plant'));
        }

        return redirect()->route('plant.index')->with('error', 'Planta não encontrada.');
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plants $plants)
    {
        /*
        $plant = Plant::find($id);

        if (isset($plant)) {
            // Note: O 'user_id' normalmente não é alterado, pois representa o criador.
            
            
            $plant->scientific_name = $request->scientific_name;
            $plant->common_name = $request->common_name;
            $plant->description = $request->description;
            $plant->benefits = $request->benefits;
            $plant->contraindications = $request->contraindications;
            $plant->usage_methods = $request->usage_methods;
            $plant->scientific_references = $request->scientific_references;
            
            $plant->save();

         
            return redirect()->route('plant.show', $plant->plant_id)->with('success', 'Planta atualizada com sucesso!');
        }

        
        return redirect()->route('plant.index')->with('error', 'Erro ao atualizar: Planta não encontrada.');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        $plant = Plant::find($id);

        if (isset($plant)) {
            $plant->delete();
            return redirect()->route('plant.index')->with('success', 'Planta deletada com sucesso!');
        }

        // Caso a planta não seja encontrada
        return redirect()->route('plant.index')->with('error', 'Erro ao deletar: Planta não encontrada.');
        */
    }
}
