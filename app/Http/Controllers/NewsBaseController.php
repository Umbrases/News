<?php

namespace App\Http\Controllers;

use App\Services\Service;

class NewsBaseController extends Controller
{
    public $service;

    public function __construct(Service $service){
        $this->service = $service;
    }
}
