<?php

namespace App\Http\Controllers;

use App\Jobs\ArticleSchedulingJob;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['published_at'] = Carbon::now()->format('Y-m-d\TH:i');
        return view('article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array = $request->validate(
            [
                'title' => 'required|string',
                'description' => 'nullable',
            ]
        );

        try {

            $array['author_id'] = auth()->user()->id;
            $article = Article::create($array);
            ArticleSchedulingJob::dispatch($article->id)->onQueue('article-scheduling')->delay(Carbon::parse($request->published_at));

            session()->flash('success', 'Your article has been create successful.');
        } catch (\Throwable $throwable) {
            session()->flash('failed', 'Your article has been create failed.');
        }
        return redirect()->route('article.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
