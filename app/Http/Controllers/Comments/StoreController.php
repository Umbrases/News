<?php

namespace App\Http\Controllers\Comments;


use Illuminate\Http\Request;
use App\Models\News;


class StoreController extends BaseController
{
    public function __invoke(News $news, Request $request)
    {
        $data = $request->validate([
            'message' => '',
        ]);
        $this->service->store($data, $news);
        return redirect()->route('news.show', $news->id);
    }
}
