<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
            $users = User::all();
            return view('user.index', compact('users'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
            return view('user.create');
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
            $user = new User();
        
            // Mapeamento dos campos da tabela users:
            $user->name = $request->name;
            $user->email = $request->email;
            // **A SENHA DEVE SER SEMPRE CRIPTOGRAFADA**
            $user->password = Hash::make($request->password); 
            $user->cnpj = $request->cnpj; // Campo opcional
            $user->role_id = $request->role_id; // Chave estrangeira
            
            $user->save();

            // Redireciona para a listagem
            return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
            $user = User::find($id);

            if (isset($user)) {
                // Retorna a view de detalhes
                return view('user.show', compact('user'));
            }

            // Caso o usuário não seja encontrado
            return redirect()->route('user.index')->with('error', 'Usuário não encontrado.');
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*
            $user = User::find($id);

            if (isset($user)) {
                // Retorna a view de edição
                return view('user.edit', compact('user'));
            }

            // Caso o usuário não seja encontrado
            return redirect()->route('user.index')->with('error', 'Usuário não encontrado.');
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*

        $user = User::find($id);

        if (isset($user)) {
            $user->name = $request->name;
            $user->email = $request->email;
            
            // Verifica se uma nova senha foi fornecida e a criptografa
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            
            $user->cnpj = $request->cnpj;
            $user->role_id = $request->role_id;
            
            $user->save();

            // Redireciona de volta para a listagem ou para o próprio usuário
            return redirect()->route('user.show', $user->user_id)->with('success', 'Usuário atualizado com sucesso!');
    }

    // Caso o usuário não seja encontrado
    return redirect()->route('user.index')->with('error', 'Erro ao atualizar: Usuário não encontrado.');

        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        $user = User::find($id);

        if (isset($user)) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
        }

        // Caso o usuário não seja encontrado
        return redirect()->route('user.index')->with('error', 'Erro ao deletar: Usuário não encontrado.');
        */
    }
}
