<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function parent()
    {
        return $this->hasOne('App\User', 'parent_id', 'user_id');
    }
}
