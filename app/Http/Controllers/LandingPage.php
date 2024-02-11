<?php

namespace App\Http\Controllers;

use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Aspirasi;

class LandingPage extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
}
