<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'contenu' => 'required'
        ]);

        $article = new Article();
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->date=now();
        $article->user_id=Auth::user()->id;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
        ]);

        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article modifié avec succès');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }

    public function details($id)
    {
        $article = Article::findOrFail($id);
        $comments = Commentaire::where('article_id', $id)->get();
        
        return view('articles.details', compact('article', 'comments'));
    }

    public function comment($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.createcomment', compact('article'));
    }
    
    public function storeComment(Request $request, $id)
{
    
    $request->validate([
        'contenu' => 'required|min:3',
    ]);
    
    $comment = new Commentaire();
    $comment->contenu = $request->contenu;
    $comment->date = now();
    $comment->article_id = $id;
    $comment->user_id = Auth::user()->id;
    $comment->save(); 

    return redirect()->route('articles.details', $id)->with('success', 'Commentaire ajouté avec succès!');
}
}