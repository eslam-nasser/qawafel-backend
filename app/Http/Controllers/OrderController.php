<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders;
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get user's cart
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        // making sure the user has a cart and it has items in it
        if(!$cart){
            return ['error' => 'This user doesn\'t have a cart!'];
        }
        if(count($cart->items) === 0){
            return ['error' => 'User\'s cart is empty!'];
        }

        // creating new order
        $request['user_id'] = $user->id;
        $request['cart_id'] = $cart->id;
        $new_order = Order::create($request->all());

        foreach($cart->items as $item) {
            $new_order_item = OrderItem::create([
                'order_id' => $new_order->id,
                'product_id' => $item->product->id,
                'product_price' => $item->product->price,
                'quantity' => $item->quantity,
            ]);
            $item->delete();
        }

        return $new_order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
