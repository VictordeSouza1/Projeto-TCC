<?php

namespace App\Http\Controllers;

use App\Models\plantas;
use Illuminate\Http\Request;

class PlantasController extends Controller
{
   public function index()
    {
        // Aqui você pode buscar dados do banco (caso queira)
        $plantas = Plantas::all();

        // Envia para a view
        return view('plantas.index', compact('plantas'));
    }

    public function create()
    {
        return view('plantas.create');
    }

    public function store(Request $request)
    {
        Plantas::create($request->all());
        return redirect()->route('home');
    }
}
