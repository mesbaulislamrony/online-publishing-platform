<?php

namespace App\Jobs;

use App\Mail\SendArticleToAdminMail;
use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ArticleSchedulingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Article::where(['id' => $this->id])->update(
            [
                'published_as' => Article::published,
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s')
            ]
        );
        $article = Article::find($this->id);
        $user = User::where('role', 'admin')->first();
        if (!empty($user)) {
            Mail::to($user->email)->send(new SendArticleToAdminMail($article));
        }
    }
}
