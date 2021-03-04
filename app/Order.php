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

    protected $appends = ['totals'];

    public function getTotalsAttribute($order){
        $order_items = $this->items;
        $total = 0;
        $subtotal = 0;
        $tax_rate = 0.15; // this should be a global configs stored in DB
        $tax_total = 0;
        foreach($order_items as $item){
            $item_total = $item->product_price * $item->quantity;
            $per_item_tax = $item_total * $tax_rate;

            $subtotal += $item_total;
            $tax_total += $per_item_tax;
            $total += $item_total + $per_item_tax;
        }
        return [
            'total' => $total,
            'subtotal' => $subtotal,
            'tax_total' => $tax_total
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
