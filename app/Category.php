<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children(){
        return $this->hasMany( 'App\Category', 'parent', 'id' );
    }
    
    public function parent(){
        return $this->hasOne( 'App\Category', 'id', 'parent' );
    }
}
