<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    // If you have a relationship with the 'users' table
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
