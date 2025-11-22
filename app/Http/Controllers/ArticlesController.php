<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        // ✔ Validação
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'description' => 'nullable|string',
            'scientific_references' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->title;
        $article->author = $request->author;
        $article->publication_date = $request->publication_date;
        $article->description = $request->description;
        $article->scientific_references = $request->scientific_references;

        // ✔ Upload da imagem
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $article->image = $path;
        }

        $article->save();

        return redirect()->route('article.index')
            ->with('success', 'Artigo publicado com sucesso!');
    }

    public function show(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            return view('article.show', compact('article'));
        }

        return redirect()->route('article.index')
            ->with('error', 'Artigo não encontrado.');
    }

    public function edit(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            return view('article.edit', compact('article'));
        }

        return redirect()->route('article.index')
            ->with('error', 'Artigo não encontrado.');
    }

    public function update(Request $request, string $id)
    {
        // ✔ Validação
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'description' => 'nullable|string',
            'scientific_references' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('article.index')
                ->with('error', 'Erro ao atualizar: Artigo não encontrado.');
        }

        $article->title = $request->title;
        $article->author = $request->author;
        $article->publication_date = $request->publication_date;
        $article->description = $request->description;
        $article->scientific_references = $request->scientific_references;

        // ✔ Atualizar imagem (substituir se houver nova)
        if ($request->hasFile('image')) {

            // Remover imagem antiga
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            // Armazenar nova
            $path = $request->file('image')->store('articles', 'public');
            $article->image = $path;
        }

        $article->save();

        return redirect()->route('article.index')
            ->with('success', 'Artigo atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('article.index')
                ->with('error', 'Erro ao deletar: Artigo não encontrado.');
        }

        // ✔ Excluir imagem do storage
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('article.index')
            ->with('success', 'Artigo deletado com sucesso!');
    }
}
