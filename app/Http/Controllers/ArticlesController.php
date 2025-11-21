<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        /*
            $articles = Article::all();
            return view('article.index', compact('articles'));
        */
    }

    public function create()
    {
        // return view('article.create');
    }

    public function store(Request $request)
    {
        /*
        $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publication_date' => 'required|date',
                'description' => 'nullable|string',
                'scientific_references' => 'nullable|string',
                // user_id e article_id são definidos no backend/BD
            ]);

            // 2. Criação do novo Artigo
            $article = new Article();
            $article->user_id = Auth::id(); // Associa ao usuário logado (foreign key) [cite: 46]
            $article->title = $request->title;
            $article->author = $request->author;
            $article->publication_date = $request->publication_date;
            $article->description = $request->description;
            $article->scientific_references = $request->scientific_references;
            $article->save();

            // 3. Redirecionamento
            return redirect()->route('article.index')->with('success', 'Artigo publicado com sucesso!');
        
        */
    }

    public function show(string $id)
    {
        /*
        $article = Article::find($id);

        if (isset($article)) {
            return view('article.show', compact('article'));
        }

        return redirect()->route('article.index');
        */
    }

    public function edit(string $id)
    {
        /*

        $article = Article::find($id);

        if(isset($article)) {
            return view('article.edit', compact('article'));
        }
        
        
        
        */
    }

    public function update(Request $request, string $id)
    {
        /*
        // 1. Validação dos dados
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'description' => 'nullable|string',
            'scientific_references' => 'nullable|string',
        ]);
        
        // Busca o artigo pelo article_id
        $article = Article::find($id);

        if (isset($article)) {
            // 2. Atualização
            $article->title = $request->title;
            $article->author = $request->author;
            $article->publication_date = $request->publication_date;
            $article->description = $request->description;
            $article->scientific_references = $request->scientific_references;
            
            $article->save();

            // 3. Redirecionamento
            return redirect()->route('article.index')->with('success', 'Artigo atualizado com sucesso!');
        }

        return redirect()->route('article.index')->with('error', 'Erro ao atualizar: Artigo não encontrado.');
        
        */
    }

    public function destroy(string $id)
    {
        /*
        // Busca o artigo pelo article_id
        $article = Article::find($id);

        if (isset($article)) {
            $article->delete();
            return redirect()->route('article.index')->with('success', 'Artigo deletado com sucesso!');
        }

        return redirect()->route('article.index')->with('error', 'Erro ao deletar: Artigo não encontrado.');
        */
    }
}
