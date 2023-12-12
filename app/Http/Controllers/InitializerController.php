<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitializerController extends Controller
{
    public function init(Request $request)
    {
        try {
            return $this->setResponse($request->user);
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
    }
}
