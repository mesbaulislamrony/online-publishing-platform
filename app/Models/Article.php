<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const draft = 'draft';
    const scheduling = 'scheduling';
    const published = 'published';

    use HasFactory;

    protected $fillable = ['title', 'description', 'author_id'];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('l M Y h:i A'),
        );
    }
}
