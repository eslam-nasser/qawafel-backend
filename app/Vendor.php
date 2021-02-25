<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        "name",
        "logo"
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
