<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        'parent'
    ];
    
    public function children(){
        return $this->hasMany(self::class, 'parent', 'id' );
    }
    
    public function parent(){
        return $this->hasOne(self::class, 'id', 'parent' );
    }
}
