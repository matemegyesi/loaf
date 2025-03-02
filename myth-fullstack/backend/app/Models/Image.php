<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type",
        "category",
        "original",
        "preview"
    ];

    public function myth()
    {
        return $this->hasOne(Myth::class);
    }
    public function legend()
    {
        return $this->belongsTo(Legend::class);
    }
}