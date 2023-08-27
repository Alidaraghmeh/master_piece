<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_orphange'];
    public function orphanage()
    {
        return $this->belongsTo(Orphanage::class, 'id_orphange');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
