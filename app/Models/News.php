<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = false;


    public function likesCount()
    {
        return $this->belongsToMany(User::class, 'news_user_likes', 'news_id', 'user_id')->count();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
