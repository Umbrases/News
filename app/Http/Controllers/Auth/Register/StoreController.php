<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Requests\Auth\StoreRequest;
use App\Providers\RouteServiceProvider;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);
        $this->service->create($request);
        return redirect()->route('news.index');
    }

}
