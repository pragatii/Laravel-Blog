<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    public function user(){
        return $this->belongsTo(Articles::class);

    }

    public function article(){
        return $this->belongsTo(Articles::class);
    }


}
