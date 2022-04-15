<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jewellery extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(JewelleryType::class);
    }

    public function images()
    {
        return $this->hasMany(Gallery::class);
    }
}
