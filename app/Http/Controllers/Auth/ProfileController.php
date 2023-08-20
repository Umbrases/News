<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;


class ProfileController extends Controller
{
    public function __invoke()
    {
        $news = News::all();
        $user = User::all();
        return view('profile', compact('news', 'user'));
    }
}
