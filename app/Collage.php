<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collage extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Gallery::class);
    }
}
