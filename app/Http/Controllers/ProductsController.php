<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $products = Product::all();
        return view('product.index', compact('products'));
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /*
        return view('product.create');
        */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $product = new Product();
        
        $product->description = $request->description;
        $product->images = $request->images; 
        $product->price = $request->price; 
        $product->save();

        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso!');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*
        $product = Product::find($id);

        if (isset($product)) {
            return view('product.show', compact('product'));
        }

        return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        /*
        $product = Product::find($id);

        if (isset($product)) {
            
            return view('product.edit', compact('product'));
        }

        return redirect()->route('product.index')->with('error', 'Produto não encontrado.');
        */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id )
    {
        /*
        $product = Product::find($id);

        if (isset($product)) {
            // Atualização dos campos:
            $product->description = $request->description;
            
            // Lidar com atualização de imagens
            $product->images = $request->images; 
            
            $product->price = $request->price; 
            
            $product->save();

            // Redireciona de volta para os detalhes do produto
            return redirect()->route('product.show', $product->product_id)->with('success', 'Produto atualizado com sucesso!');
        }

        // Caso o produto não seja encontrado
        return redirect()->route('product.index')->with('error', 'Erro ao atualizar: Produto não encontrado.');
        */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        $product = Product::find($id);

        if (isset($product)) {
            
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Produto deletado com sucesso!');
        }

        return redirect()->route('product.index')->with('error', 'Erro ao deletar: Produto não encontrado.');
        */
    }
}
