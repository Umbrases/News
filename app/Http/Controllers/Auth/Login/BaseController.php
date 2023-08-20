<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Services\Auth\LoginService;


class BaseController extends Controller
{
    public $service;
    public function __construct(LoginService $service){
        $this->service = $service;
    }
}
