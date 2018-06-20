<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customize extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
