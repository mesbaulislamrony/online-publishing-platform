<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $data['articles'] = Cache::rememberForever(
            'articles',
            function () {
                return Article::where(['published_as' => Article::published])->orderBy('id', 'desc')->get();
            }
        );
        return view('articles', $data);
    }
}
