<?php

namespace App\Http\Controllers\Inventory\BuyBill;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\BuyBill;
use App\Models\BuyBillProduct;
use App\Models\BuyOrder;
use App\Models\Payment;

class BuyBillController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * add buy bill
   * 
   */
  public function create($id)
  {
    $user = Auth::user()->id;

    $buyOrder = BuyOrder::where('id', $id)->with('user', 'wareHouse', 'buyProducts')->first();

    return view('inventory.buyBill.add', compact('buyOrder'));
  }

  /**
   * save buy bill
   * 
   */
  public function store(Request $request)
  {
    $user = auth()->user();
    $buyBill = new BuyBill;
    $buyBill->recieve_date = $request->recieve_date;
    $buyBill->total_price = $request->total_price;
    $buyBill->buy_order_id = $request->order_id;
    $buyBill->user_id = $user->id;
    $buyBill->save();


    for($i = 0;$i< count($request->recieve_quantity); $i++)
    {
      if($request->recieve_quantity[$i] !=null && $request->recieve_quantity[$i]!=0)
      {
      
        $buybillproduct[$i] =new BuyBillProduct;

        $buybillproduct[$i]->buy_product_id = $request->id[$i];
        
        $buybillproduct[$i]->production_date = $request->production_date[$i];
        $buybillproduct[$i]->expired_date = $request->expaire_date[$i];

        $buybillproduct[$i]->purchasing_price = $request->individual_price[$i];
        $buybillproduct[$i]->selling_price = $request->payment_price[$i] ;

        $buybillproduct[$i]->available_quantity=$request->recieve_quantity[$i] ;
        $buybillproduct[$i]->quantity_recived= $request->recieve_quantity[$i] ;

        $buybillproduct[$i]->buy_bill_id = $buyBill->id;
        $buybillproduct[$i]->save();
      }
        
    }

    $buyBill->total_payment = $request->total_payment;
    $buyBill->save();

    $payment=new Payment;
    $payment->buy_bill_id = $buyBill->id;
    $payment->payment_price = $request->total_payment;
    $payment->payment_date = $request->recieve_date;
    $payment->save();
    return back();
  }

  /**
   * show all buy bills
   * 
   */
  public function all()
  {
    $title = "All Buy Bills | Received Order";
    $buyBills = BuyBill::with('wareHouse', 'branch', 'user')->get();
    return view('inventory.buyBill.all', compact('buyBills', 'title'));
  }

  /**
   * show buy bill List In Inventory
   * 
   */
  public function allInInventory()
  {
    $user = Auth::user();

    $title = "Received Order List In Inventory";

    $buyBills = BuyBill::join('users', 'users.id', 'buy_bills.user_id')
    ->where('users.branch_id', $user->branch_id)
    ->select('buy_bills.id', 'buy_order_id','recieve_date', 'total_price', 'total_payment', 'user_id')
    ->with('wareHouse', 'branch', 'user')->get();

    return view('Inventory.buyBill.all', compact('buyBills', 'title'));
  }

  /**
   * pay amount of buy bill
   * 
   */
  public function addPayment($id, Request $request)
  {
    $payment = new Payment;
    $payment->date = $request->date;
    $payment->amount = $request->payment;

    $buybill = BuyBill::find($id);
    $buybill->total_payment = $buybill->total_payment + $request->payment;

    $payment->save();
    $buybill->save();
    return back();
  }
}
