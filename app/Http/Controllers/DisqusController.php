<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisqusController extends Controller
{
    public function index()
    {
        return view('disqus.index');
    }
}
