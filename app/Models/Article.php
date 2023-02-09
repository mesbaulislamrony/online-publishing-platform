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

    protected $fillable = ['title', 'description', 'date', 'time', 'published_as', 'author_id'];

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('l M Y h:i A'),
        );
    }

    public function scopeDailyCounter($query)
    {
        return $query->where(['author_id' => auth()->user()->id, 'date' => Carbon::today()->format('Y-m-d')]);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
