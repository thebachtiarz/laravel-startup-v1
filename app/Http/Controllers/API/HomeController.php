<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        return view('body.home.homepage');
    }

    public function products()
    {
        return view('body.home.products');
    }
}
