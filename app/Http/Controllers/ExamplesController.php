<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamplesController extends Controller
{
    public function increment()
    {
        return view('react/increment');
    }
    public function videos()
    {
        return view('react/videos');
    }
}
