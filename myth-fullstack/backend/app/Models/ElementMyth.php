<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementMyth extends Model
{
    use HasFactory;

    protected $table = "element_myth";

    protected $fillable = [
        "element_id",
        "myth_id",
    ];
}
