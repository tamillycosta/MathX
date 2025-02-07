<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadMap extends Model
{
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
