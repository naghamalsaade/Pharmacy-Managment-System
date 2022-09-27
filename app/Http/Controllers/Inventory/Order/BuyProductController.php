<?php

namespace App\Http\Controllers\Inventory\Order;

use App\Http\Controllers\Controller;


use App\Models\BuyProduct;

class BuyProductController extends Controller
{
  /**
   * show all products in order
   * 
   */
  public function all($id)
  {
    $buyProducts = BuyProduct::where('buy_order_id', $id)->get();
    return view('inventory.order.ordere_products', compact('buyProducts'));
  }

}
