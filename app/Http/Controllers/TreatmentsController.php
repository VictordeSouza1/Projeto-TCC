<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Planta;
use Illuminate\Support\Facades\Auth;

class TreatmentsController extends Controller
{
    /**
     * Listar tratamentos
     */
    public function index()
    {
        $treatments = Treatment::with('planta')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('treatment.index', compact('treatments'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        $plantas = Planta::all();

        return view('treatment.create', compact('plantas'));
    }

    /**
     * Salvar
     */
    public function store(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|exists:plantas,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'modo_preparo' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        Treatment::create([
            'plant_id' => $request->plant_id,
            'user_id' => Auth::id(), // user_id é nullable mas aqui salva o logado
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'modo_preparo' => $request->modo_preparo,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('treatment.index')
            ->with('success', 'Tratamento criado com sucesso!');
    }

    /**
     * Mostrar um tratamento
     */
    public function show(string $id)
    {
        $treatment = Treatment::with('planta')->findOrFail($id);

        return view('treatment.show', compact('treatment'));
    }

    /**
     * Formulário de edição
     */
    public function edit(string $id)
    {
        $treatment = Treatment::findOrFail($id);
        $plantas = Planta::all();

        return view('treatment.edit', compact('treatment', 'plantas'));
    }

    /**
     * Atualizar
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'plant_id' => 'required|exists:plantas,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'modo_preparo' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        $treatment = Treatment::findOrFail($id);

        $treatment->update([
            'plant_id' => $request->plant_id,
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'modo_preparo' => $request->modo_preparo,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('treatment.index')
            ->with('success', 'Tratamento atualizado com sucesso!');
    }

    /**
     * Deletar
     */
    public function destroy(string $id)
    {
        $treatment = Treatment::findOrFail($id);

        $treatment->delete();

        return redirect()->route('treatment.index')
            ->with('success', 'Tratamento deletado com sucesso!');
    }
}
