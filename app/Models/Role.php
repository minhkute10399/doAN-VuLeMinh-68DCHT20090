<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillables = [
        'name',

    ];

    public function users()
    {
        $this->hasMany(User::class);
    }
}