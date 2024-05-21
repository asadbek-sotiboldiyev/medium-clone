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

    protected $fillable = ['title', 'poster', 'content', 'user_id', 'tag'];

    public function getAuthor(){
        $author = User::findOrFail($this->user_id);
        return $author;
    }

}
