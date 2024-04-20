<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('articles/index', $data = [
            'articles' => $articles
        ]);
    }

    public function show($id){
        $article = Article::findOrFail($id);
        return view('articles/show', $data = [
            'article' => $article
        ]);
    }

    public function store()
    {
        return view('articles/store');
    }

    public function create(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'poster' => 'required',
            'content' => 'required',
        ]);
        $validated_data['user_id'] = $request->user()->id;
        $filename = time() . $request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('post-images', $filename, 'public');

        $validated_data['poster'] = '/storage/' . $path;

        $article = Article::create($validated_data);

        return redirect('/articles/' . $article->id);
    }
}

