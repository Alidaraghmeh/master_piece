<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventssub extends Model
{
    use HasFactory;
    protected $fillable = ['email_U', 'name_U', 'name_event'];

}
