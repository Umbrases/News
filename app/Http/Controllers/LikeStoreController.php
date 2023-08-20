<?php

namespace App\Http\Controllers;

use App\Models\News;


class LikeStoreController extends Controller
{
    public function __invoke(News $news)
    {
        auth()->user()->likedNews()->toggle($news->id);
        return redirect()->route('news.show', $news->id);
    }
}
