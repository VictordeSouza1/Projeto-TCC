<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Product::class);
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        Gate::authorize('create', Product::class);
        return view('product.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Product::class);

        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco'     => 'required|numeric',
            'imagem'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $product = new Product();
        $product->name        = $request->nome;
        $product->description = $request->descricao;
        $product->price       = $request->preco;

        if ($request->hasFile('imagem')) {
            $product->image = $request->file('imagem')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso!');
    }

    public function show(Product $product)
    {
        Gate::authorize('view', $product);
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        Gate::authorize('update', $product);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        Gate::authorize('update', $product); // corrigido

        $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco'     => 'required|numeric',
            'imagem'    => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $product->name        = $request->nome;
        $product->description = $request->descricao;
        $product->price       = $request->preco;

        if ($request->hasFile('imagem')) {
            $product->image = $request->file('imagem')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('product.show', $product->id)
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product); // primeiro autorizo
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produto deletado com sucesso!');
    }
}
