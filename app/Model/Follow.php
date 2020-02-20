<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class Follow extends Model
{
    //
    const UPDATED_AT = null;
    public function follower(){
        return $this->belongsTo('App\Model\User', "follower_id");
    }
    public function followed(){
        return $this->belongsTo('App\Model\User', "followed_id");
    }
}
