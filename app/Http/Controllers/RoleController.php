<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        /*
          $roles = Role::all();return view('role.index', compact('roles'));
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
        $role = new Role();
        $role->nome = $request->nome;
        $role->save();

        return redirect()->route('role.index');
        */
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
            $role = Role::find($id);

            if(isset($role)) {
                return view('role.show', compact('role'));
            }

            return redirect()->route('role.index');
        */
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*
        $role = Role::find($id);

        if(isset($role)) {
            return view('role.edit', compact('role'));
        }

        return redirect()->route('role.index');
        */
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
        $role = Role::find($id);

        if(isset($role)) {
            $role->nome = $request->nome;
            $role->save();   
        }

        return redirect()->route('planta.index');
        */
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        $role = Role::find($id);

        if(isset($role)) {
            $role->delete();
        }

        return redirect()->route('role.index');
        */
        
    }
}
