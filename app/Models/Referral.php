<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    public function level_2() {

        return $this->hasMany('App\User', 'parent_id', 'user_id');
   
    }

    public function ref_user() {

        return $this->hasOne('App\User', 'id', 'ref_user_id');
   
    }
   
    public function refuser() {
   
        return $this->hasOne('App\User', 'id', 'user_id');
   
    }
}
