<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillables = [
        'title',
        'description',
        'video_url',
        'course_id',

    ];

    public function exercises()
    {
        $this->hasMany(Exercise::class);
    }

    public function course()
    {
        $this->belongsTo(Courses::class);
    }
}
