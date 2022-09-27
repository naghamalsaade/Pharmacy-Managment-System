<?php

namespace App\Models;

class CartReturn
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;
    public $customer;

    public function __Construct($cart = null) 
    {
        if($cart) 
        {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
            $this->customer = $cart->customer;
        } 
        else 
        {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
            $this->customer = -1;
        }
    }

    public function addCustomer($id)
    {
        $this->customer = $id;
    }

    public function add($I_P, $num) 
    {
        $item = [
            'I_P' => $I_P,
            'qty' => 0,
        ];

        if(!array_key_exists($I_P->id, $this->items)) 
        {
            $this->items[$I_P->id] = $item ;
            $this->totalQty += $num;
            $this->totalPrice += $I_P->product_price*$num;
        } 
        else 
        {
            $this->totalQty += $num ;
            $this->totalPrice += $I_P->product_price*$num;
        }

        $this->items[$I_P->id]['qty']  += $num ;
    }
 
    public function remove($id) 
    {
        if( array_key_exists($id, $this->items)) 
        {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['I_P']->product_price;
            unset($this->items[$id]);
        }
    }

    public function updateQty($id, $qty) 
    {
        $this->totalQty  = array_key_exists($id,$this->items) ? $this->items[$id]['qty']: 0;
        $this->totalPrice -= ($this->items[$id]->product_price)* $this->items[$id]['qty'];

        // add the item with new qty
        $this->items[$id]['qty'] = $qty;

        // total price and total qty in cart
        $this->totalQty += $qty ;
        $this->totalPrice += $this->items[$id]->product_price * $qty;
    }
}