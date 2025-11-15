<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Exibe todos os produtos.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Mostra o formulário para criar um novo produto.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Armazena um novo produto no banco.
     */
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

        // Upload da imagem
        if ($request->hasFile('imagem')) {
            $product->image = $request->file('imagem')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Mostra os detalhes de um produto.
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

        return view('product.show', compact('product'));
    }

    /**
     * Mostra o formulário para editar um produto.
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

        return view('product.edit', compact('product'));
    }

    /**
     * Atualiza os dados do produto.
     */
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

        return redirect()->route('product.show', $product->id)->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove um produto.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        }

        // Se quiser deletar a imagem ao excluir o produto:
        // Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produto deletado com sucesso!');
    }
}
