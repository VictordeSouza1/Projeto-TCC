<?php

namespace App\Http\Controllers;

use App\Models\Treatment; // Assumindo que o Model é Treatment
use App\Models\Plant;     // Para buscar a planta relacionada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        // Obtém todos os tratamentos
        $treatments = Treatment::all();
        
        // Retorna a view de índice, passando os tratamentos
        return view('treatment.index', compact('treatments'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        // Se precisar preencher um dropdown de plantas, você pode buscar:
        $plants = Plant::all();
        return view('treatment.create', compact('plants'));
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        // 1. Validação dos dados
        $request->validate([
            'plant_id' => 'required|exists:plants,plant_id', // Garante que a planta exista
            'treatment_description' => 'required|string',
            'scientific_references' => 'nullable|string',
        ]);

        // 2. Criação do novo Tratamento
        $treatment = new Treatment();
        $treatment->plant_id = $request->plant_id;
        $treatment->user_id = Auth::id(); // Associa ao usuário logado (foreign key)
        $treatment->treatment_description = $request->treatment_description;
        $treatment->scientific_references = $request->scientific_references;
        $treatment->save();

        // 3. Redirecionamento
        return redirect()->route('treatment.index')->with('success', 'Tratamento cadastrado com sucesso!');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
        // Busca o tratamento pelo treatment_id
        $treatment = Treatment::find($id);

        if (isset($treatment)) {
            // Retorna a view de visualização, passando o tratamento
            return view('treatment.show', compact('treatment'));
        }

        // Redireciona com erro se não encontrar
        return redirect()->route('treatment.index')->with('error', 'Tratamento não encontrado.');
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*
        // Busca o tratamento pelo treatment_id
        $treatment = Treatment::find($id);
        
        if (isset($treatment)) {
            // Se precisar preencher um dropdown de plantas, você pode buscar:
            $plants = Plant::all();
            return view('treatment.edit', compact('treatment', 'plants'));
        }

        // Redireciona com erro se não encontrar
        return redirect()->route('treatment.index')->with('error', 'Tratamento não encontrado.');
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
        // 1. Validação dos dados
        $request->validate([
            'plant_id' => 'required|exists:plants,plant_id',
            'treatment_description' => 'required|string',
            'scientific_references' => 'nullable|string',
        ]);
        
        // Busca o tratamento pelo treatment_id
        $treatment = Treatment::find($id);

        if (isset($treatment)) {
            // 2. Atualização dos campos
            $treatment->plant_id = $request->plant_id;
            // user_id não é alterado, pois representa o criador
            $treatment->treatment_description = $request->treatment_description;
            $treatment->scientific_references = $request->scientific_references;
            
            $treatment->save();

            // 3. Redirecionamento
            return redirect()->route('treatment.show', $treatment->treatment_id)->with('success', 'Tratamento atualizado com sucesso!');
        }

        return redirect()->route('treatment.index')->with('error', 'Erro ao atualizar: Tratamento não encontrado.');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        // Busca o tratamento pelo treatment_id
        $treatment = Treatment::find($id);

        if (isset($treatment)) {
            $treatment->delete();
            return redirect()->route('treatment.index')->with('success', 'Tratamento deletado com sucesso!');
        }

        // Redireciona com erro se não encontrar
        return redirect()->route('treatment.index')->with('error', 'Erro ao deletar: Tratamento não encontrado.');
        */
    }
}