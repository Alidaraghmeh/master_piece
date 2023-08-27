<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_event',
        'date_event',
        'time_event',
        'time_event1',
        'address_event',
        'description_event',
        'name_orphanage',
        'image_event',
    ];



}
