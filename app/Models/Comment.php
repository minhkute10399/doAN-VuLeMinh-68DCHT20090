<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'course_id',
        'user_id',
        'content',
        'parent_id',

    ];

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
