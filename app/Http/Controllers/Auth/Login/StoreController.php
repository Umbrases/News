<?php

namespace App\Http\Controllers\Auth\Login;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $this->service->create($request);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

}
