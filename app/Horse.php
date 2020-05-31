<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    protected $guarded = [];

    public function riders()
    {
        return $this->belongsToMany(Rider::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
