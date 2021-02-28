<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Shared method for getting the cart content and calculating the totals
     */
    public function get_cart_content(){
        // get user
        $user = auth()->user();
        // check if this user has a cart
        $cart = Cart::where('user_id', $user->id)->get();
        if(count($cart) === 0){
            // this user has no cart, so we will create a new one for him
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
        }else{
            $cart = $cart->first();
        }

        // populate the product object in each cart item
        $items = $cart->items;
        foreach($items as $key => $item){
            $product = Product::where('id', $item->product_id)->first();
            $items[$key]['product'] = $product;
            $items[$key]['item_total'] = $product->price * $items[$key]->quantity;
        }
        $cart['items'] = $items;

        // calculate cart totals
        $total = 0;
        foreach($items as $item){
            $total += $item->item_total;
        }
        $cart['total'] = $total;

        return $cart;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->get_cart_content();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $req = $request->validate([
            'item_id' => 'required|integer',
            'item_quantity' => 'required|integer'
        ]);
        
        $cart = $this->get_cart_content();

        // check if this item already has a CartItem
        $cart_item = CartItem::where('cart_id', $cart->id)->where('product_id', $req['item_id'])->get();
        if(count($cart_item) === 0) {
            // its the first time this user add this product to this cart
            $cart_item = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $req['item_id'],
                'quantity' => $req['item_quantity'],
            ]);
        } else {
            // this product was added before to cart, we just need to update the quantity
            $cart_item = $cart_item->first();
            $cart_item->quantity = $req['item_quantity'];
            $cart_item->save();
        }


        return $this->get_cart_content();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // validate request
        $req = $request->validate([
            'item_id' => 'required|integer'
        ]);
        $cart = $this->get_cart_content();
        $cart_item = CartItem::where('product_id', $req['item_id'])->where('cart_id', $cart->id)->first();

        if($cart_item && $cart_item->id){
            $cart_item->delete();
        }

        return $this->get_cart_content();
    }
}
