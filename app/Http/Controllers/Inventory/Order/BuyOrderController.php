<?php

namespace App\Http\Controllers\Inventory\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\BuyOrder;
use App\Models\BuyProduct;
use App\Models\Warehouse;
use App\Models\MedicalSupply;
use App\Models\Medicine;
use App\Models\CosmeticProduct;
use App\Models\MedicalFood;

use Illuminate\Support\Carbon;


class BuyOrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * add order
   * 
   */
  public function create()
  {
    $user = Auth::user();
    $warehouses = Warehouse::select('name','id')->get();
    $medicine = Medicine::select('generic_name as name', 'product_id');
    $MedicalSupply = MedicalSupply::select('name', 'product_id');
    $MedicalFood = MedicalFood::select('name', 'product_id');
    $CosmeticProduct = CosmeticProduct::select('name', 'product_id');
    $allproducts = $MedicalFood->union($MedicalSupply)->union($medicine)->union($CosmeticProduct)->get();
    return view('inventory.order.add', compact('user', 'warehouses', 'allproducts'));
  }

  /**
   * save order
   * 
   */
  public function store(Request $request)
  {
    $user = Auth::user();

    $buyOrdr = new BuyOrder;
    $buyOrdr->order_date = $request->order_date;
    $buyOrdr->user_id = $user->id;
    $buyOrdr->warehouse_id = $request->warehouse_id;
    $buyOrdr->save();

    for($i = 0; $i < count($request->quantity); $i++)
    {
      $buyProduct[$i] = new BuyProduct;
      $buyProduct[$i]->quantity_order = $request->quantity[$i];
      $buyProduct[$i]->product_id = $request->product_id[$i];
      $buyProduct[$i]->Buy_order_id = $buyOrdr->id;
      $buyProduct[$i]->save();
    }

    $buyOrdr->save();
    return redirect('/order/all-in-inventory');
  }

  /**
   * show all orders
   * 
   */
  public function all(Request $request)
  {
    if($request->has('start_date') && $request->has('end_date'))
    {
      $title = "All Order Between ". $request->start_date. " - ". $request->end_date;

      $start_date = Carbon::parse($request->start_date)->toDateTimeString();
      $end_date = Carbon::parse($request->end_date)->toDateTimeString();

      $buyOrders = BuyOrder::whereBetween('order_date',[$start_date,$end_date])->with('user', 'wareHouse', 'branch')->get();
    }

    else
    {
      $title = "All Order";
      $buyOrders = BuyOrder::with('user', 'wareHouse', 'branch')->get();

    }
    return view('inventory.order.all', compact('buyOrders', 'title'));
  }

  /**
   * show all orders in inventory
   * 
   */
  public function allInInventory(Request $request)
  {
    $user = auth()->user();

    if($request->has('start_date') && $request->has('end_date'))
    {
      $title = "All Order In Inventory Between ". $request->start_date. " - ". $request->end_date;

      $start_date = Carbon::parse($request->start_date)->toDateTimeString();
      $end_date = Carbon::parse($request->end_date)->toDateTimeString();

      $buyOrders = BuyOrder::join('users', 'users.id', '=', 'buy_orders.user_id')
      ->where('users.branch_id', $user->branch_id)->whereBetween('order_date',[$start_date,$end_date])
      ->select('buy_orders.id', 'order_date', 'user_id', 'warehouse_id')
      ->with('user', 'wareHouse')->get();    
    }

    else
    {
      $title = "All Order In Inventory";

      $buyOrders = BuyOrder::join('users', 'users.id', '=', 'buy_orders.user_id')->where('users.branch_id', $user->branch_id)
      ->select('buy_orders.id', 'order_date', 'user_id', 'warehouse_id')
      ->with('user', 'wareHouse')->get();
    }
        
    return view('inventory.order.all', compact('buyOrders', 'title'));
  }
}





