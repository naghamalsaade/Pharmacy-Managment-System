<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalQty ;
    public $totalPrice;

    public function __Construct($cart = null) 
    {
        if($cart) 
        {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } 
        else 
        {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($bIn_id, $p_name, $p_price) 
    {
        $item = [
            'bIn_id' => $bIn_id,
            'p_name' => $p_name,
            'p_price' => $p_price,
            'qty' => 0,
        ];

        if( !array_key_exists($bIn_id, $this->items)) 
        {
            $this->items[$bIn_id] = $item ;
            $this->totalQty += 1;
            $this->totalPrice += $p_price; 
        } 
        else 
        {
            $this->totalQty += 1 ;
            $this->totalPrice += $p_price; 
        }

        $this->items[$bIn_id]['qty']  += 1;
    }
}