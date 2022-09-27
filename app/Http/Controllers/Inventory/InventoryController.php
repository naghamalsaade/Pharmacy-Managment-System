<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;

use App\Traits\ProductTrait;

use App\Models\Branch;
use App\Models\BuyBill;
use App\Models\BuyOrder;
use App\Models\CosmeticProduct;
use App\Models\MedicalFood;
use App\Models\MedicalSupply;
use App\Models\Medicine;
use App\Models\Warehouse;

class InventoryController extends Controller
{
    use ProductTrait;

    /**
     * show all inventories
     * 
     */
    public function all()
    {
        $title = "Inventory List";
        $branches = Branch::where('type', '0')
        ->select('id', 'name', 'email', 'location_id', 'type', 'active')->get();

        return view('branch.all', compact('branches', 'title'));
    }

    /**
     * show all warehouses that the specific inventory deals with
     * 
     */
    public function allWareHouse($branch_id)
    {
        $branch = Branch::find($branch_id);
        $title = "Warehouses List That Inventory (".$branch->name .") Deals With";

        $warehouses = Warehouse::join('buy_orders', 'warehouses.id', '=', 'buy_orders.warehouse_id')
        ->join('users', 'users.id', '=', 'buy_orders.user_id')
        ->where('users.branch_id', $branch_id)
        ->select('warehouses.id', 'warehouses.name', 'warehouses.address', 'warehouses.mobile', 'warehouses.email')->distinct()->get();

        return view('inventory.warehouse.all', compact('warehouses', 'title'));
    }

    /**
     * show all orders in specific inventory
     * 
     */
    public function allOrder($branch_id)
    {
        $branch = Branch::find($branch_id);
        $title = "Order List In Inventory : ".$branch->name;

        $buyOrders = BuyOrder::join('users', 'users.id', '=', 'buy_orders.user_id')->where('users.branch_id', $branch_id)
        ->with('user', 'wareHouse', 'branch')->get();
        return view('inventory.order.all', compact('buyOrders', 'title'));
    }

    /**
     * show all buy bills in specific inventory
     * 
     */
    public function allBuyBill($branch_id)
    {
        $branch = Branch::find($branch_id);
        $title = "Buy Bill List In Inventory : ".$branch->name;

        $buyBills = BuyBill::join('users', 'users.id', 'buy_bills.user_id')
        ->join('buy_orders', 'buy_orders.id', 'buy_bills.buy_order_id')
        ->where('users.branch_id', $branch_id)
        ->select('buy_bills.id', 'buy_order_id','recieve_date', 'total_price', 'total_payment', 'buy_bills.user_id')
        ->with('wareHouse', 'branch', 'user')->get();
    
        return view('inventory.buyBill.all', compact('buyBills', 'title'));
    }

    /**
     * show all products in specific inventory
     * 
     */
    public function allProduct($inventory_id)
    {
        $branch = Branch::find($inventory_id);
        $title = "Product List In Inventory : ". $branch->name;

        $medicines =  $this ->getProductInInventory(new Medicine())
            ->where('users.branch_id',$inventory_id)
            ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
                'image','generic_name as name');

        $medicalFoods =  $this ->getProductInInventory(new MedicalFood())
            ->where('users.branch_id',$inventory_id)
            ->select('buy_bill_products.id','available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
                'image', 'medical_foods.name');

        $medicalSupplies =  $this ->getProductInInventory(new MedicalSupply())
            ->where('users.branch_id',$inventory_id)
            ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
                'image', 'medical_supplies.name');

        $cosmeticProducts =  $this ->getProductInInventory(new CosmeticProduct())
            ->where('users.branch_id',$inventory_id)
            ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
                'image', 'cosmetic_products.name');

        $products = $medicines->union($medicalFoods)->union($medicalSupplies)->union($cosmeticProducts)->get();

        return view('inventory.all_products', compact('products', 'title'));
    }
}
