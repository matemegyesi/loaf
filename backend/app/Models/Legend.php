<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Legend extends Model
{
    use HasFactory;
    public function habitat(): HasOne
    {
        return $this->hasOne(Habitat::class, 'id', 'habitat_id');
    }
    public function image(){
        return $this->hasOne(Image::class, 'id', 'image_id');
    }
}
