<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['articles'] = Article::where(['author_id' => auth()->user()->id])->orderBy('id', 'desc')->get();
        return view('dashboard', $data);
    }
}
