<?php

namespace App\Http\Controllers\Product\Cosmetic;

use App\Http\Controllers\Controller;
use App\Http\Requests\CosmeticProductRequest;

use Illuminate\Http\Request;

use App\Traits\ProductTrait;

use App\Models\CosmeticProduct;
use App\Models\Product;

class CosmeticProductController extends Controller
{
    use ProductTrait;

    public function create()  
    {
        return view('product.cosmeticProduct.add');
    }

    public function store(CosmeticProductRequest $request) 
    {
        //save photo in folder.
        $file_name = $this -> saveImage($request -> image , 'images/products');

        //save cosmetic product into database
        $product = Product::create([
            'image'=> $file_name,
            'bar_code'=> $request->bar_code,
            'product_country'=> $request->product_country,
            'manufacturer_company'=>$request->manufacturer_company,
        ] );

        CosmeticProduct::create([
            'name'=> $request->name,
            'product_id'=> $product->id,
            'ingredients'=>$request->ingredients,
            'description'=>$request->description,
        ]);
        return redirect('cosmetic-product/all');
    }

    public function all()
    {
        $title = "All Cosmetic Product";
        $cosmeticProducts = CosmeticProduct::join('products', 'products.id', '=', 'cosmetic_products.product_id')
        ->select('cosmetic_products.id', 'name', 'ingredients', 'description', 'manufacturer_company', 'product_country', 'bar_code', )->get();
        return view('product.cosmeticProduct.all', compact('cosmeticProducts', 'title')) ;
    }

    public function edit($id) 
    {
        //search id cosmetic product.
        $cosmeticProduct = CosmeticProduct::find($id);
        if(!$cosmeticProduct)
            return redirect()->back() ;

        $cosmeticProduct = CosmeticProduct::with('product')->find($id);
        return view('product.cosmeticProduct.edit', compact('cosmeticProduct'));
    }

    public function update(Request $request, $id) 
    {
        //check if cosmetic product. exist.
        $cosmeticProduct = CosmeticProduct::find($id);
        $cosmeticProduct::with('product')->get();
        $product = Product::find($cosmeticProduct->product_id);
        if(!$cosmeticProduct)
            return redirect() -> back() ;

        //update data.
        $cosmeticProduct->update($request->all());
        $product->update($request->all());
        return redirect('cosmetic-product/all');
    }

    public function delete($id) 
    {
        //check if id cosmetic product exist.
        $cosmeticProduct = CosmeticProduct::find($id);
        if(!$cosmeticProduct)
            return redirect()->back();

        //delete the cosmetic product.
        $cosmeticProduct -> delete();
        return redirect()->back();
    }

    public function allInPharmacy()  
    {
        $title = "Cosmetic Product List In Pharmacy";

        $user = auth()->user();

        $cosmeticProducts = $this -> getProductInPharmacy(new CosmeticProduct())
        ->where('books_in.branch_id', $user->branch_id)
        -> select('cosmetic_products.id', 'cosmetic_products.name', 'ingredients',
            'description', 'image', 'bar_code',
            'product_country', 'manufacturer_company')->distinct()->get();

       return  view('product.cosmeticProduct.all', compact('cosmeticProducts', 'title')) ;
    }

    public function allInInventory()  
    {
        $title = "Cosmetic Product List In Inventory";

        $user = auth()->user();

        $products =  $this ->getProductInInventory(new CosmeticProduct())
        ->where('users.branch_id',$user->branch_id)
        ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
            'image', 'cosmetic_products.name')->get();

       return view('inventory.all_products', compact('products', 'title')) ;
    }

    /**
     * Show cosmetic products in pharmacy as grid
     * 
     */
    public function grid() 
    {
        $user = auth()->user();

        $cosmeticProducts = $this -> getProductInPharmacy(new CosmeticProduct())
        // ->where('books_in.active', '!=', '0')
        ->where('books_in.amount', '!=', '0')
        ->where('books_in.branch_id', $user->branch_id)
        ->select('books_in.id', 'cosmetic_products.name',
            'image', 'selling_price', 'amount', 'expired_date')->get();

        return view('product.cosmeticProduct.cosmetics_grid', compact('cosmeticProducts'));
    }

    /**
     * Show all the details for specifi cosmetic product
     * 
     */
    public function showDetails($id) 
    {
        $details = $this -> getProductInPharmacy(new CosmeticProduct())
        ->where('books_in.id', $id)
        ->select('cosmetic_products.id', 'cosmetic_products.name', 'ingredients', 'description', 'product_country',
            'manufacturer_company', 'image', 'bar_code',
            'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.cosmeticProduct.show_details', compact('details'));
    }

    /**
     * Show all the batches that entered the pharmacy
     * 
     */
    public function showBatches($id)  
    {
        $batches =  $this -> getProductInPharmacy(new CosmeticProduct())
        ->where('cosmetic_products.id', $id)
        ->select('books_in.id', 'cosmetic_products.name', 'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.cosmeticProduct.show_batches', compact('batches'));
    }
}