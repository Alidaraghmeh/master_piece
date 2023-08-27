<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function orphan()
    {
        return $this->belongsTo(Orphan::class, 'id_orph');
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
