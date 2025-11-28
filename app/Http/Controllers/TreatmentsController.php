<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Planta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TreatmentsController extends Controller
{
    /**
     * Listar tratamentos
     */
    public function index()
    {
        Gate::authorize('viewAny', Treatment::class); // Gate adicionado

        $research = request('search');

        if($research) {
            $treatments = Treatment::where(function($query) use ($research) {
                $query->where('nome', 'like', '%'.$research.'%')
                      ->orWhere('descricao', 'like', '%'.$research.'%');
            })->get();
        } else {
            $treatments = Treatment::with('planta')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('treatment.index', ['treatments' => $treatments, 'research' => $research]);
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        Gate::authorize('create', Treatment::class); // Gate adicionado

        $plantas = Planta::all();
        return view('treatment.create', compact('plantas'));
    }

    /**
     * Salvar
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Treatment::class); // Gate adicionado

        $request->validate([
            'plant_id' => 'required|exists:plantas,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'modo_preparo' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

        Treatment::create([
            'plant_id' => $request->plant_id,
            'user_id' => Auth::id(),
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
        $treatment = Treatment::findOrFail($id);
        Gate::authorize('view', $treatment); // Gate adicionado

        $treatment->load('planta');
        return view('treatment.show', compact('treatment'));
    }

    /**
     * Formulário de edição
     */
    public function edit(string $id)
    {
        $treatment = Treatment::findOrFail($id);
        Gate::authorize('update', $treatment); // Gate adicionado

        $plantas = Planta::all();
        return view('treatment.edit', compact('treatment', 'plantas'));
    }

    /**
     * Atualizar
     */
    public function update(Request $request, string $id)
    {
        $treatment = Treatment::findOrFail($id);
        Gate::authorize('update', $treatment); // Gate adicionado

        $request->validate([
            'plant_id' => 'required|exists:plantas,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'modo_preparo' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ]);

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
        Gate::authorize('delete', $treatment); // Gate adicionado

        $treatment->delete();

        return redirect()->route('treatment.index')
            ->with('success', 'Tratamento deletado com sucesso!');
    }
}
