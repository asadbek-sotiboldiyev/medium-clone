<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Article;

class TagController extends Controller
{
    public function articlesByTag($tag_name = "")
    {
        if (empty($tag_name))
            return redirect()->route('articleIndex');
        $articles = Article::
            leftJoin('tags', 'articles.tag', '=', 'tags.id')
            ->where('tags.name', '=', $tag_name)
            ->select('articles.*')
            ->paginate(50);
        
        return view('articles/bytag', $data = [
            'articles' => $articles,
            'tag' => $tag_name,
            'tags' => Tag::all()
        ]);
    }
}
