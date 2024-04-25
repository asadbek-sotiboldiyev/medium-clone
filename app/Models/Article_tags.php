<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_tags extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $hidden = ['created_at', 'updated_at', 'returning'];

    protected $fillable = ['tag_id', 'article_id'];

}
