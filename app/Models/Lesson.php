<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'course_id',

    ];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
