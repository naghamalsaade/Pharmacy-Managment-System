<?php

namespace App\Http\Controllers\Inventory\Transform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

use App\Models\BookIn;
use App\Models\ProductPlace;
use App\Models\Branch;
use App\Models\BuyBillProduct;

class TransformController extends Controller
{
    /**
     * transform product frome inventory to pharmacy
     * 
     */
    public function transform($id, $amount)
    {
        $pharmacies = Branch::where('type', '1')
        ->select('id', 'name', 'email', 'location_id')
        ->get();

        return view('inventory.transform.convert_to_pharmacy', compact('pharmacies'), compact('id', 'amount'));
    }
    
    /**
     * save the new batch in bookin and put it in specific place
     * 
     */
    public function store(Request $request)
    {
        $place = ProductPlace::create([

            'closet'=> $request->closet,
            'rack'=> $request->rack,
            'drawer'=> $request->drawer,
        ]);

        BookIn::create([

            'quantity'=> $request->quantity,
            'amount'=>$request->quantity,
            'branch_id'=> $request->branch_id,
            'product_place_id'=> $place->id,
            'buy_bill_product_id'=>$request->buy_bill_product_id,
            'date'=>Carbon::today(), 
        ]);

        $buyBillProduct = BuyBillProduct::find($request->buy_bill_product_id);
        $buyBillProduct->decrement('available_quantity', $request->quantity);

        return redirect()->back();
    }
}
