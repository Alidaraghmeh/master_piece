<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    use HasFactory;
    public function orphan()
    {
        return $this->hasMany(Orphan::class, 'id_orphanage');
    }

}
