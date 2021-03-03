<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "user_id",
        "firstname",
        "lastname",
        "mobile",
        "email",
        "address1",
        "address2",
        "city",
        "country",
        "notes",
        "total",
        "subtotal",
        "taxs",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
