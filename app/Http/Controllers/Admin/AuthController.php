<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegisterFormRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * This function is for authenticating an Admin
     */
    public function login()
    {

    }

    public function register(RegisterFormRequest $request)
    {
       Admin::create($request->validated());

       return redirect()->route("");
    }

    public function logout()
    {

    }

}
