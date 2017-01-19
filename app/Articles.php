<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

   // protected $fillable = ['title','content','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function action(){
        return $this->hasMany(Actions::class);
    }
}
