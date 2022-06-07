<?php

namespace App\Http\Controllers;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    public function index()
    {
        return view('users.index');
    }
}