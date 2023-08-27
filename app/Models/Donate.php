<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'NID', 'phone', 'email', 'card_name', 'card_number', 'amount'
    ];
    

}
