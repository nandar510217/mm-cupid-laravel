<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostLoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLoginForm()
    {
        return view('test.login');
    }
    public function postLoginForm(PostLoginRequest $request)
    {
        // dd($request->all());
        return view('test.login');
    }
}
