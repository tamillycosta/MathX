<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
