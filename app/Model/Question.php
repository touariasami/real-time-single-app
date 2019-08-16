<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    protected static function boot(){
        
        parent::boot();

        static::creating(function($question){
            $question->slug = str_slug($question->title);
        });

    }

    protected $fillable = ['title','body','category_id','user_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
         return $this->belongsTo('App\User');
    }

    public function replies(){
         return $this->hasMany('App\Model\Reply');
    }

    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

    public function getPathAttribute(){
        return "/questions/".$this->slug ;
    }


    
}
