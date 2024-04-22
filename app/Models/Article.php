<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'content', 'user_id'];

    public function getAuthor(){
        $author = User::findOrFail($this->user_id);
        return $author;
    }
}
