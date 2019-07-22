<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function user(){
         return $this->belongsTo('App\User');
    }

    public function replies(){
         return $this->hasMany('App\Mpdel\Reply');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }
}
