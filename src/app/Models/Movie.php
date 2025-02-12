<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'movie_title',
        'movie',
        'chapter_id',
        'second',
        'created_by',
        'updated_by',
        'display_num',
    ];

    public function chapter() {
        return $this->belongsTo(Chapter::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
