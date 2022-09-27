<?php

namespace App\Http\Controllers\Inventory\WareHouse;

use App\Http\Controllers\Controller;
use App\Models\BuyBill;
use App\Models\BuyOrder;
use Illuminate\Http\Request;

use App\Models\Warehouse;

class WarehouseController extends Controller
{
  /**
   * add warehouse 
   * 
   */
  public function create()
  {
    return view('inventory.warehouse.add');
  }

  /**
   * update warehouse 
   * 
   */
  public function store(Request $request)
  {
    $warehouse = new Warehouse;
    $warehouse->name = $request->name;
    $warehouse->address = $request->adress;
    $warehouse->mobile = $request->mobile;
    $warehouse->email = $request->email;
    $radio = $request->radio;

    if($request->radio == 'Active')
    {
      $warehouse->is_active = 1;
    }
    elseif($request->radio == 'Inactive')
    {
     $warehouse->is_active = 0;
    }

    $warehouse->save();
    return redirect("/warehouse/all");
  }

  /**
   * show all warehouses
   * 
   */
  public function all()
  {
    $title =" All Warehouses";
    $warehouses = Warehouse::whereNull('deleted_at')->get();
    return view('inventory.warehouse.all', compact('warehouses', 'title'));
  }

  /**
   * edit warehouse 
   * 
   */
  public function edit($id)
  {
    $warehouse = Warehouse::find($id);
    return view('inventory.warehouse.edit', compact('warehouse'));
  }

  /**
   * update warehouse 
   * 
   */
  public function update($id, Request $request)
  {
    $warehouse = Warehouse::find($id);
    if($request->radio == 'Inactive')
    {
      $warehouse->is_active = 0;
    }
    else
    {
      $warehouse->is_active = 1;
    }

    $warehouse->name = $request->name;
    $warehouse->address = $request->adress;
    $warehouse->mobile = $request->mobile;
    $warehouse->email = $request->email;
    $radio = $request->radio;
    $warehouse->save();
    return redirect("/warehouse/all");
  }

  /**
   * delete warehouse 
   * 
   */
  public function delete($id)
  {
    $warehouse = Warehouse::where('id', $id)->first();
    $warehouse->delete();
    return back();
  }

  /**
   * show all warehouses that the inventory deals with
   * 
   */
  public function allInInventory()
  {
      $user = auth()->user();

      $warehouses = Warehouse::join('buy_orders', 'warehouses.id', '=', 'buy_orders.warehouse_id')
        ->join('users', 'users.id', '=', 'buy_orders.user_id')
        ->where('users.branch_id', $user->branch_id)
        ->select('warehouses.id', 'warehouses.name', 'warehouses.address', 'warehouses.mobile', 'warehouses.email')->distinct()->get();

        return view('inventory.warehouse.all', compact('warehouses'));
  }

  /**
   * show all orders in warehouse
   * 
   */
  public function allOrder($warehouse_id) 
  {
    $warehouse = Warehouse::find($warehouse_id);
    $title = "All Order Send To Warhouse : ".  $warehouse->name;

    $buyOrders = BuyOrder::with('user', 'wareHouse')->where('warehouse_id', $warehouse_id)->get();

    return view('inventory.order.all', compact('buyOrders', 'title'));
  }

  /**
   * show all buy bills in warehouse
   * 
   */
  public function allBuyBill($warehouse_id)
  {
    $warehouse = Warehouse::find($warehouse_id);
    $title = "All Buy Bill From Warhouse : ".  $warehouse->name;

    $buyBills = BuyBill::with(['user' => function($query) { $query->select('name', 'id'); }])
    ->with(['buyOrder' => function($query) use($warehouse_id) { $query->where('warehouse_id', $warehouse_id); $query->select('warehouse_id', 'id');}])->get();

    return view('inventory.buyBill.all', compact('buyBills', 'title'));
  } 
}
