<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['articles'] = Article::orderBy('id', 'desc')->get();
        return view('articles', $data);
    }
}
