<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;
use App\Models\Article_tags;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'content', 'user_id'];

    public function getAuthor(){
        $author = User::findOrFail($this->user_id);
        return $author;
    }

    public function getTags(){
        $tags_ids = Article_tags::select('tag_id')
            ->where('article_id', $this->id)
            ->get();
        $tags = Tag::select('*')
            ->whereIn('id', $tags_ids)
            ->get();
        return $tags;
    }

    public function tagCheck($tag){
        $tags = $this->getTags();
        foreach($tags as $article_tag)
            if($tag == $article_tag)
                return true;
        return false;
    }

}
