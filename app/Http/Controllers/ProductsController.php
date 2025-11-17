<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
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

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

        return view('product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

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

        return redirect()->route('product.show', $product->product_id)
                         ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produto deletado com sucesso!');
    }
}
