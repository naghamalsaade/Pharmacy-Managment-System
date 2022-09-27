<?php

namespace App\Http\Controllers\Product\Supply;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalSupplyRequest;

use Illuminate\Http\Request;

use App\Traits\ProductTrait;

use App\Models\MedicalSupply;
use App\Models\Product;

class MedicalSupplyController extends Controller
{
    use ProductTrait;

    public function create() 
    {
        $user = auth()->user();
        return view('product.medicalSupply.add', compact('user'));
    }

    public function store(MedicalSupplyRequest $request) 
    {
        //save photo in folder.
        $file_name = $this -> saveImage($request -> image , 'images/products');

        //save medical supply into database
        $product = Product::create([
            'image'=> $file_name,
            'bar_code'=> $request->bar_code,
            'product_country'=> $request->product_country,
            'manufacturer_company'=>$request->manufacturer_company,
        ] );

            MedicalSupply::create([
            'name'=> $request->name,
            'product_id'=> $product->id,
            'use_to' => $request->use_to,
        ]);
            return redirect('medical-supply/all');
    }

    public function all()
    {
        $title = "All Medical Supply";
        $medicalSupplies = MedicalSupply::join('products', 'products.id', '=', 'medical_supplies.product_id')
        ->select('medical_supplies.id', 'name', 'manufacturer_company', 'product_country', 'use_to', 'bar_code', 'image')->get();
        return view('product.medicalSupply.all', compact('medicalSupplies', 'title'));
    }

    public function edit($id)
    {
        //search id medical supply.
        $medicalSupply = MedicalSupply::find($id);
        if(!$medicalSupply)
            return redirect()->back() ;

        $medicalSupply = MedicalSupply::with('product')->find($id);
        return view('product.medicalSupply.edit', compact('medicalSupply'));
    }

    public function update(Request $request, $id)  
    {
        //check if medical supply exist.
        $medicalSupply = MedicalSupply::find($id);
        $medicalSupply::with('product')->get();
        $product = Product::find($medicalSupply->product_id);

        if(!$medicalSupply)
            return redirect() ->back() ;

        //update data.
         $medicalSupply->update($request->all());
         $product->update($request->all());
        return redirect('medical-supply/all');
    }

    public function delete($id)
    {
        //check if id medical supply exist.
        $medicalSupply = MedicalSupply::find($id);
        if(!$medicalSupply)
            return redirect()->back();

        //delete the medical supply.
        $medicalSupply -> delete();
        return redirect()->back();
    }

    public function allInPharmacy()  
    {
        $title = "Medical Supply List In Pharmacy";

        $user = auth()->user();

        $medicalSupplies =  $this -> getProductInPharmacy(new MedicalSupply())
        ->where('books_in.branch_id', $user->branch_id)
        -> select('medical_supplies.id', 'medical_supplies.name', 'use_to', 'image', 'bar_code',
             'product_country', 'manufacturer_company')->distinct()->get();

       return view('product.medicalSupply.all', compact('medicalSupplies', 'title')) ;
    }

    public function allInInventory()  
    {
        $title = "Medical Supply List In Inventory";

        $user = auth()->user();

        $products =  $this ->getProductInInventory(new MedicalSupply())
       ->where('users.branch_id',$user->branch_id)
        ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
            'image', 'medical_supplies.name')->get();

       return view('inventory.all_products', compact('products', 'title')) ;
    }

    /**
     * Show medical supply in pharmacy as grid
     * 
     */
    public function grid() 
    {
        $user = auth()->user();

        $medicalSupplies = $this -> getProductInPharmacy(new MedicalSupply())
        // ->where('books_in.active', '!=', '0')
        ->where('books_in.amount', '!=', '0')
        ->where('books_in.branch_id', $user->branch_id)
        ->select('books_in.id', 'medical_supplies.name',
            'image', 'selling_price', 'amount', 'expired_date')->get();

        return view('product.medicalSupply.medical_supply_grid', compact('medicalSupplies'));
    }

    /**
     * Show all the details for specifi medical supply
     * 
     */
    public function showDetails($id)  
    {
        $details = $this -> getProductInPharmacy(new MedicalSupply())
        ->where('books_in.id', $id)
        ->select('medical_supplies.id', 'medical_supplies.name', 'use_to', 'product_country', 'manufacturer_company',
            'image', 'bar_code', 'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price',
            'expired_date', 'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.medicalSupply.show_details', compact('details'));
    }

    /**
     * Show all the batches that entered the pharmacy
     * 
     */
    public function showBatches($id)  
    {
        $batches = $this -> getProductInPharmacy(new MedicalSupply())
        ->where('medical_supplies.id', $id)
        ->select('books_in.id', 'medical_supplies.name', 'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.medicalSupply.show_batches', compact('batches'));
    }
}