<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillables = [
        'title',
        'url',
        'lesson_id',

    ];

    public function lesson()
    {
        $this->belongsTo(Lesson::class);
    }

    public function users()
    {
        $this->belongsToMany(User::class, 'exercise_user');
    }
}
