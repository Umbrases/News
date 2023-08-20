<?php

namespace App\Services\Comments;

use App\Models\Comment;

class CommentsService
{
    public function store($data, $news)
    {
        $user_id = auth()->user()->id;
        $news_id = $news->id;

        $fanfiction = Comment::create([
            'message' => $data['message'],
            'news_id' => $news_id,
            'user_id' => $user_id,
        ]);
    }


}
