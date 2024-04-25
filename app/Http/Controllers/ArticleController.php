<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Article_tags;
use App\Models\Tag;
use Symfony\Component\Console\Input\Input;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $tags = Tag::all();
        return view('articles/index', $data = [
            'articles' => $articles,
            'tags' => $tags
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $auth_user = Auth::user();

        return view('articles/show', $data = [
            'article' => $article,
            'USER' => $auth_user,
        ]);
    }

    public function store()
    {
        $tags = Tag::all();
        return view('articles/store', $data = [
            'tags' => $tags
        ]);
    }

    public function create(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'poster' => 'required',
            'content' => 'required',
            'tag' => 'required'
        ]);
        
        $validated_data['user_id'] = $request->user()->id;

        $filename = time() . $request->file('poster')->getClientOriginalName();
        $path = $request->file('poster')->storeAs('post-images', $filename, 'public');

        $validated_data['poster'] = '/storage/' . $path;

        $article = Article::create($validated_data);

        foreach($request->input('tag', []) as $tag_id){
            $article_tag = new Article_tags;
            $article_tag->article_id = $article->id;
            $article_tag->tag_id = $tag_id;
            $article_tag->save();
        }

        return redirect('/articles/' . $article->id);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Tag::all();
        return view('articles/edit', $data = [
            'article' => $article,
            'tags' => $tags
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::findOrFail($id);
        
        if (!empty($request->file('poster'))){
            $filename = $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('post-images', time() . $filename, 'public');

            $validated_data['poster'] = '/storage/' . $path;
        }
        $article->update($validated_data);

        return redirect('/articles/' . $article->id);
    }
}
