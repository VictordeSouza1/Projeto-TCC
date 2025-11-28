<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use Illuminate\Support\Facades\Gate;

class PlantaController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Planta::class);

        $research = request('search');

        if ($research) {
            $plantas = Planta::where(function ($query) use ($research) {
                $query->where('nome', 'like', '%'.$research.'%')
                      ->orWhere('tipo', 'like', '%'.$research.'%')
                      ->orWhere('descricao', 'like', '%'.$research.'%');
            })->get();
        } else {
            $plantas = Planta::all();
        }

        return view('planta.index', [
            'plantas'  => $plantas,
            'research' => $research
        ]);
    }

    public function create()
    {
        Gate::authorize('create', Planta::class);

        return view('planta.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Planta::class);

        $request->validate([
            'nome'      => 'required|string|max:255',
            'tipo'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagem'    => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        $planta = new Planta();
        $planta->nome      = $request->nome;
        $planta->tipo      = $request->tipo;
        $planta->descricao = $request->descricao;

        if ($request->hasFile('imagem')) {
            $planta->imagem = $request->file('imagem')->store('plantas', 'public');
        }

        $planta->save();

        return redirect()->route('planta.index');
    }

    public function show(Planta $planta)
    {
        Gate::authorize('view', $planta);

        return view('planta.show', compact('planta'));
    }

    public function edit(Planta $planta)
    {
        Gate::authorize('update', $planta);

        return view('planta.edit', compact('planta'));
    }

    public function update(Request $request, Planta $planta)
    {
        Gate::authorize('update', $planta);

        $request->validate([
            'nome'      => 'required|string|max:255',
            'tipo'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagem'    => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        $planta->nome      = $request->nome;
        $planta->tipo      = $request->tipo;
        $planta->descricao = $request->descricao;

        if ($request->hasFile('imagem')) {
            $planta->imagem = $request->file('imagem')->store('plantas', 'public');
        }

        $planta->save();

        return redirect()->route('planta.show', $planta->id);
    }

    public function destroy(Planta $planta)
    {
        Gate::authorize('delete', $planta);

        $planta->delete();

        return redirect()->route('planta.index');
    }
}
