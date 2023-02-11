<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Plan;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Cache::rememberForever(
            'articles',
            function () {
                return Article::where(['published_as' => Article::published])->orderBy('id', 'desc')->get();
            }
        );
        return view('home', $data);
    }
}
