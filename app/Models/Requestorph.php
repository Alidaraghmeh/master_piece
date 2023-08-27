<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestorph extends Model
{
  
    protected $fillable = ['name_orphan', 'name_orphange', 'name_user', 'id_orphange','full_name',
    'name_orphan',
    'name_orphanage',
    'name_user',
    'email',
    'phone',
    'amount',
    'address',
    'card_number',
    'card_name',];

}
