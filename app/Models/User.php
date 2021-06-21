<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'images', 'email', 'password', 'role_id', 'status', 'banned_until',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_user', 'user_id', 'exercise_id')
            ->withTimestamps()
                ->withPivot('url');
    }

    public function courses()
    {
        return $this->belongsToMany(Courses::class, 'course_user', 'user_id', 'course_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_user', 'lesson_id', 'user_id')->withTimestamps();
    }
}
