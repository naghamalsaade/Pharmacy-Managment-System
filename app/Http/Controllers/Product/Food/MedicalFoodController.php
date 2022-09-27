<?php

namespace App\Http\Controllers\Product\Food;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalFoodRequest;

use Illuminate\Http\Request;

use App\Traits\ProductTrait;

use App\Models\MedicalFood;
use App\Models\Product;

class MedicalFoodController extends Controller
{
    use ProductTrait;

    public function create()
    {
        return view('product.medicalFood.add');
    }

    public function store(MedicalFoodRequest $request) 
    {
        //save photo in folder.
        $file_name = $this -> saveImage($request -> image , 'images/products');

        //save medical food into database
         $product = Product::create([
            'image'=> $file_name,
            'bar_code'=> $request->bar_code,
            'product_country'=> $request->product_country,
            'manufacturer_company'=>$request->manufacturer_company,

        ] );

        MedicalFood::create([
            'name'=> $request->name,
            'product_id'=> $product->id,
            'storage' => $request->storage,
            'adverse_effects' => $request->adverse_effects,

        ]);
        return redirect('medical-food/all');
    }

    public function all()
    {
        $title = "All Medical Food";
        $medicalFoods = MedicalFood::join('products', 'products.id', '=', 'medical_foods.product_id')
        ->select('medical_foods.id', 'name', 'storage', 'adverse_effects', 'manufacturer_company', 'product_country', 'bar_code', 'image')->get();
        return view('product.medicalFood.all', compact('medicalFoods', 'title')) ;
    }

    public function edit($id)
    {
        //search id medical food.
        $medicalFood = MedicalFood::find($id);
        if(!$medicalFood)
            return redirect()->back() ;

        $medicalFood = MedicalFood::with('product')->find($id);
        return view('product.medicalFood.edit', compact('medicalFood'));
    }

    public function update(Request $request, $id)  
    {
        //check if medical food exist.
        $medicalFood = MedicalFood::find($id);
        $medicalFood::with('product')->get();
        $product = Product::find($medicalFood->product_id);

        if(!$medicalFood)
            return redirect() -> back() ;

        //update data.
         $medicalFood->update($request->all());
         $product->update($request->all());
        return redirect('medical-food/all');
    }

    public function delete($id)
    {
        //check if id medical food exist.
        $medicalFood = MedicalFood::find($id);
        if(!$medicalFood)
            return redirect()->back();

        //delete the medical food.
        $medicalFood -> delete();
        return redirect()->back();
    }

    public function allInPharmacy()
    {
        $title = "Medical Food List In Pharmacy";

        $user = auth()->user();

        $medicalFoods =  $this -> getProductInPharmacy(new MedicalFood())
        ->where('books_in.branch_id', $user->branch_id)
        -> select('medical_foods.id', 'medical_foods.name', 'adverse_effects',
            'storage', 'image', 'bar_code',
            'product_country', 'manufacturer_company')->distinct()->get();

       return view('product.medicalFood.all', compact('medicalFoods', 'title')) ;
    }
    
    public function allInInventory()  
    {
        $title = "Medical Food List In Inventory";

        $user = auth()->user();

        $products =  $this ->getProductInInventory(new MedicalFood())
        ->where('users.branch_id',$user->branch_id)
        ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
            'image', 'medical_foods.name')->get();

       return view('inventory.all_products', compact('products', 'title')) ;
    }

    /**
     * Show medical foods in pharmacy as grid
     * 
     */
    public function grid()
    {
        $count = 0;
        $user = auth()->user();

        $medicalFoods = $this -> getProductInPharmacy(new MedicalFood())
        // ->where('books_in.active', '!=', '0')
        ->where('books_in.amount', '!=', '0')
        ->where('books_in.branch_id', $user->branch_id)
        ->select('books_in.id', 'medical_foods.name',
            'image', 'selling_price', 'amount', 'expired_date')->get();

        return view('product.medicalFood.medical_food_grid', compact('medicalFoods', 'count'));
    }

    /**
     * Show all the details for specifi medical food
     * 
     */
    public function showDetails($id)  
    {
        $details = $this -> getProductInPharmacy(new MedicalFood())
        ->where('books_in.id', $id)
        ->select('medical_foods.id', 'medical_foods.name', 'storage', 'adverse_effects', 'product_country', 'manufacturer_company', 'image', 'bar_code',
            'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.medicalFood.show_details', compact('details'));
    }

    /**
     * Show all the batches that entered the pharmacy
     * 
     */
    public function showBatches($id)
    {
       // $user = auth()->user();
        $batches = $this -> getProductInPharmacy(new MedicalFood())
        ->where('medical_foods.id', $id)
        ->select('books_in.id', 'medical_foods.name', 'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.medicalFood.show_batches', compact('batches'));
    }
}