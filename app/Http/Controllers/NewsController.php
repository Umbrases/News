<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends NewsBaseController
{
    public function index()
    {
        $news = News::paginate(2);
        return view('News.index', compact('news'));
    }

    public function create()
    {
        return view('News.create');
    }

    public function store(Request $request)
    {
        $this->service->store($request);
        return redirect()->route('news.index');
    }
    public function show(News $news)
    {
        return view('News.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('News.edit', compact('news'));
    }

    public function update(News $news, Request $request)
    {
        $this->service->update($news, $request);
        return redirect()->route('news.show', $news->id);
    }

    public function destroy(News $news)
    {
//        if (isset($news->comments)){
//            $news->comments->delete();
//        dd($news->comments);
//        }
        $news->delete();
        return redirect()->route('news.index');
    }
}
