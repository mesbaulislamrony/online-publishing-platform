<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const draft = 'draft';
    const scheduling = 'scheduling';
    const published = 'published';

    use HasFactory;

    protected $fillable = ['title', 'description', 'published_as', 'author_id'];
}
