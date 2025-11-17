<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;

class PlantaController extends Controller
{
    public function index()
    {
        $plantas = Planta::all();
        return view('planta.index', compact('plantas'));
    }

    public function create()
    {
        return view('planta.create');
    }

    public function store(Request $request)
    {
        $planta = new Planta();
        $planta->nome = $request->nome;
        $planta->tipo = $request->tipo;
        $planta->descricao = $request->descricao;

        // --- SALVAR IMAGEM ---
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('plantas', 'public');
            $planta->imagem = $path; // salva o caminho no banco
        }

        $planta->save();

        return redirect()->route('planta.index');
    }

    public function show(string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            return view('planta.show', compact('planta'));
        }

        return redirect()->route('planta.index');
    }

    public function edit(string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            return view('planta.edit', compact('planta'));
        }

        return redirect()->route('planta.index');
    }

    public function update(Request $request, string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            $planta->nome = $request->nome;
            $planta->tipo = $request->tipo;
            $planta->descricao = $request->descricao;

            // --- ATUALIZAR IMAGEM SE O USUÁRIO ENVIAR OUTRA ---
            if ($request->hasFile('imagem')) {
                $path = $request->file('imagem')->store('plantas', 'public');
                $planta->imagem = $path;
            }

            $planta->save();
        }

        return redirect()->route('planta.index');   
    }

    public function destroy(string $id)
    {
        $planta = Planta::find($id);

        if(isset($planta)) {
            $planta->delete();
        }

        return redirect()->route('planta.index');
    }
}
