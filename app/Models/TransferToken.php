<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferToken extends Model
{
     public function user(){
    	return $this->belongsTo('App\User', 'username', 'id')->select(['id', 'username','first_name']);
    }

    public function users(){
    	return $this->belongsTo('App\User', 'user_id', 'id')->select(['id', 'username','first_name']);
    }
}
