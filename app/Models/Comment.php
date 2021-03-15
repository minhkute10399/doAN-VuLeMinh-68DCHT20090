<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillables = [
        'course_id',
        'user_id',
        'content',
        'parent_id',

    ];

    public function course()
    {
        $this->belongsTo(Courses::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
