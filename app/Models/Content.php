<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function roadmap(){
        return $this->belongsTo(RoadMap::class);
    }

    public function topics(){
        return $this->hasMany(Topic::class);
    }


}
