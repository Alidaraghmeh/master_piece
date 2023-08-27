<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestvol extends Model
{
    use HasFactory;
    protected $fillable = ['name_user', 'email', 'message'];

}
