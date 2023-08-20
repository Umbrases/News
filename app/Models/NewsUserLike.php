<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsUserLike extends Model
{
    use HasFactory;
    protected $table = 'news_user_likes';
    protected $guarded = false;
}
