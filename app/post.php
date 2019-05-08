<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(category::class,'cat_id');
    }
}
