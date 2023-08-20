<?php

namespace App\Http\Controllers\Auth\PasswordConfirmation;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('auth.confirm-password');
    }
}
