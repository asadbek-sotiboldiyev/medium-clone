<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_tags;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleTagsController extends Controller
{
    public function articlesByTag($tag_name = "")
    {
        if (empty($tag_name))
            return redirect()->route('articleIndex');
        
        $tag = Tag::where('name', $tag_name)->first();
        $l = Article_tags::select('article_id')
            ->where('tag_id', $tag->id)
            ->get();
        $articles = Article::select('*')
            ->whereIn('id', $l)
            ->get();

        return view('articles/bytag', $data = [
            'articles' => $articles,
            'tag' => $tag,
            'tags' => Tag::all()
        ]);
    }
}
