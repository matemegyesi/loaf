<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    use HasFactory;

    public function myths(){
        return $this->hasMany(Myth::class);
    }
    public function legends(){
        return $this->belongsToMany(Legend::class);
    }
}
