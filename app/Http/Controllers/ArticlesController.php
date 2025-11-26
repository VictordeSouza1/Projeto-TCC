<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// IMPORTAÇÕES CORRETAS PARA INTERVENTION 3
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Gate;

class ArticlesController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Article::class);
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        Gate::authorize('create', Article::class);
        return view('article.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Article::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'publication_date' => 'required|date',
            'description' => 'nullable|string',
            'scientific_references' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $article = new Article();
        $article->user_id = Auth::id();
        $article->title = $request->title;
        $article->author = $request->author;
        $article->publication_date = $request->publication_date;
        $article->description = $request->description;
        $article->scientific_references = $request->scientific_references;

        // PROCESSAMENTO DA IMAGEM (INTERVENTION v3)
        if ($request->hasFile('image')) {

            $manager = new ImageManager(new Driver());
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $image = $manager->read($file)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $path = 'articles/' . $filename;

            $image->save(storage_path('app/public/' . $path));

            $article->image = $path;
        }

        $article->save();

        return redirect()->route('article.index')->with('success', 'Artigo publicado com sucesso!');
    }

    public function show($id)
    {
        $article = Article::find($id);

        Gate::authorize('view', $article);

        if ($article) return view('article.show', compact('article'));

        return redirect()->route('article.index')->with('error', 'Artigo não encontrado.');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        Gate::authorize('update', $article);
        
        if ($article) return view('article.edit', compact('article'));

        return redirect()->route('article.index')->with('error', 'Artigo não encontrado.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'publication_date' => 'required|date',
            'description' => 'nullable|string',
            'scientific_references' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $article = Article::find($id);
        Gate::authorize('view', $article);

        if (!$article) return redirect()->route('article.index')->with('error', 'Artigo não encontrado.');

        $article->title = $request->title;
        $article->author = $request->author;
        $article->publication_date = $request->publication_date;
        $article->description = $request->description;
        $article->scientific_references = $request->scientific_references;

        if ($request->hasFile('image')) {

            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            $manager = new ImageManager(new Driver());
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

            $image = $manager->read($file)->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $path = 'articles/' . $filename;

            $image->save(storage_path('app/public/' . $path));

            $article->image = $path;
        }

        $article->save();

        return redirect()->route('article.index')->with('success', 'Artigo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        Gate::authorize('delete', $article);

        if (!$article) return redirect()->route('article.index')->with('error', 'Artigo não encontrado.');

        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('article.index')->with('success', 'Artigo deletado com sucesso!');
    }
}
