<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Mostrar carrinho
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

 public function add(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Produto não encontrado.'], 404);
    }

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantidade'] += 1;
    } else {
        $cart[$id] = [
            'id'         => $product->id,
            'nome'       => $product->name,
            'descricao'  => $product->description,
            'preco'      => $product->price,
            'imagem'     => $product->image,
            'quantidade' => 1,
        ];
    }

    session()->put('cart', $cart);

    // 👇 ISSO resolve 100% o erro interno
    return response()->json([
        'success' => true,
        'message' => 'Produto adicionado ao carrinho!'
    ]);
}


    // Atualizar quantidade
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->back()->with('error', 'Item não encontrado no carrinho.');
        }

        $cart[$id]['quantidade'] = $request->quantidade;
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Quantidade atualizada.');
    }

    // Remover item
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produto removido do carrinho.');
    }

    // Finalizar compra
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'O carrinho está vazio.');
        }

        // Aqui você coloca pagamento e pedido no futuro

        session()->forget('cart');

        return redirect()->route('product.index')
                         ->with('success', 'Compra finalizada com sucesso!');
    }

    // Esvaziar carrinho
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Carrinho esvaziado!');
    }
}
