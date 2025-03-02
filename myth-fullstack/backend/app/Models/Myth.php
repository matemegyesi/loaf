<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myth extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'habitat_id',
        'size_id',
        'image_id',
        'elements'
    ];

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function elements()
    {
        return $this->belongsToMany(Element::class, "element_myth")->withTimestamps();
    }

    public function image(){
        return $this->belongsTo(Image::class);
    }
}
