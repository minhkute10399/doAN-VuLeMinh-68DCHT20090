<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use SoftDeletes;

    protected $fillables = [
        'name',
        'description',
        'images',
        'category_id',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        $this->belongsToMany(User::class, 'course_user');
    }

    public function lessons()
    {
        $this->hasMany(Lesson::class);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }
}
