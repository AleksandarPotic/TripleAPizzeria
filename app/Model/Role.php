<?php

namespace App\Model;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
