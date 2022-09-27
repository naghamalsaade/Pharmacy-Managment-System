<?php

namespace App\Http\Controllers\Inventory\BuyBill;

use App\Http\Controllers\Controller;

use App\Models\BuyBillProduct;


class BuyBillProductController extends Controller
{
  /**
   * show all products in buy bill
   * 
   */
  public function all($buy_bill_id)
  {
    $buyBillProducts = BuyBillProduct::where('buy_bill_id', $buy_bill_id)
    ->with('buyProduct')->get();
    return view('inventory.buyBill.buybill_products', compact('buyBillProducts'));
  }
}
