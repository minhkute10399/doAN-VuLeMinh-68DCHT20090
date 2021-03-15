<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillables = [
        'name',
        'parent_id',
    ];

    public function courses()
    {
        $this->hasMany(Courses::class);
    }

}
