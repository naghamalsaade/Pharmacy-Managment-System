<?php

namespace App\Http\Controllers\Product\Medicine;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineRequest;

use Illuminate\Http\Request;

use App\Traits\ProductTrait;

use App\Models\Medicine;
use App\Models\Product;
use App\Models\Type;
use App\Models\AgeGroup;
use App\Models\Category;
use App\Models\EffectiveMaterial;

class MedicineController extends Controller
{
    use ProductTrait;

    public function create()
    {
        $types = Type::all();
        $ageGroups = AgeGroup::all();
        $categories = Category::all();
        $effectiveMaterials = EffectiveMaterial::all();

        return view('product.medicine.add', compact('types', 'ageGroups', 'categories', 'effectiveMaterials'));
    }

    public function store(MedicineRequest $request)  
    {
        //save photo in folder.
        $file_name = $this -> saveImage($request -> image , 'images/products');

        //save medicine into database.
         $product = Product::create([
            'image'=> $file_name,
            'bar_code'=> $request->bar_code,
            'product_country'=> $request->product_country,
            'manufacturer_company'=>$request->manufacturer_company,
        ]);

        $medicine = Medicine::create([
            'generic_name'=> $request->generic_name,
            'medicine_name'=> $request->medicine_name,
            'alternative_medicine'=> $request->alternative_medicine,
            'caliber'=> $request->caliber,
            'composition'=> $request->composition,
            'indications'=> $request->indications,
            'product_id'=> $product->id,
            'type_id'=> $request->type_id,
            'age_group_id'=> $request->age_group_id,
            'category_id'=> $request->category_id,
        ]);

        $medicine -> effectiveMaterials() -> syncWithoutDetaching($request -> effective_material_ids);

        return redirect('/medicine/all');
    }

    public function all()
    {
        $title = "All Medicine";
        $medicines = Medicine::join('products', 'products.id', '=', 'medicines.product_id')
        ->join('types', 'types.id', '=', 'medicines.type_id')
        ->join('categories', 'categories.id', '=', 'medicines.category_id')
        ->join('age_groups', 'age_groups.id', '=', 'medicines.age_group_id')
        ->select('medicines.id', 'medicine_name', 'generic_name', 'name_category', 'name_type', 'name_age_group',
        'product_country', 'caliber', 'composition', 'alternative_medicine', 'indications', 'manufacturer_company',
        'bar_code', 'image')->get();
        return view('product.medicine.all', compact('medicines', 'title'));
    }

    public function edit($id)
    {
        $types = Type::all();
        $ageGroups = AgeGroup::all();
        $categories = Category::all();
        $effectiveMaterials = EffectiveMaterial::all();

        //search id medicine
        $medicine = Medicine::find($id);
        if(!$medicine)
            return redirect()->back() ;

        $medicine = Medicine::with('product', 'type', 'category', 'ageGroup')->find($id);
        return view('product.medicine.edit', compact('medicine',  'types', 'ageGroups', 'categories', 'effectiveMaterials'));
    }

    public function update(Request $request, $id)  
    {
        //check if medicine
        $medicine = Medicine::find($id);
        if(!$medicine)
            return redirect() -> back() ;

        $product = Product::find($medicine->product_id);
        //update data.
         $medicine->update($request->all());
         $product->update($request->all());
        return redirect('/medicine/all');
    }

    public function delete($id)
    {
        //check if id medicine exist.
        $medicine = Medicine::find($id);
        if(!$medicine)
            return redirect()->back();

        //delete the medicine.
        $medicine -> delete();
        return redirect()->back();
    }

    public function allInPharmacy()  
    {
        $title = "Medicine List In Pharmacy";

        $user = auth()->user();

        $medicines = $this -> getProductInPharmacy(new Medicine())
        ->join('types', 'medicines.type_id', '=', 'types.id')
        ->join('categories', 'medicines.category_id', '=', 'categories.id')
        ->join('age_groups', 'medicines.age_group_id', '=', 'age_groups.id')
        ->where('books_in.branch_id', $user->branch_id)
        ->select('medicines.id', 'generic_name', 'medicine_name', 'name_category', 'name_age_group', 'name_type',
            'caliber', 'composition', 'alternative_medicine', 'indications', 'product_country', 'manufacturer_company',
            'image', 'bar_code')->distinct()->get();

        return view('product.medicine.all', compact('medicines', 'title'));
    }

    public function allInInventory()  
    {
        $title = "Medicine List In Inventory";

        $user = auth()->user();

        $products =  $this ->getProductInInventory(new Medicine())
        ->where('users.branch_id',$user->branch_id)
        ->select('buy_bill_products.id', 'available_quantity', 'expired_date', 'purchasing_price', 'selling_price',
            'image', 'medicines.generic_name as name')->get();

       return view('inventory.all_products', compact('products', 'title')) ;
    }

    /**
     * Show medicins in pharmacy as grid
     * 
     */
    public function grid()  
    {
        $user = auth()->user();

        $medicines =  $this -> getProductInPharmacy(new Medicine())
        ->where('books_in.amount', '!=', '0')
        // ->where('books_in.active', '!=', '0')
        ->where('books_in.branch_id', $user->branch_id)
        ->select('books_in.id', 'generic_name',
            'image', 'selling_price', 'amount', 'expired_date')->get();

         return view('product.medicine.medicine_grid', compact('medicines'));
    }

    /**
     * Show all the details for specifi medicines
     * 
     */
    public function showDetails($id)  
    {
        $details = $this -> getProductInPharmacy(new Medicine())
        ->join('types', 'medicines.type_id', '=', 'types.id')
        ->join('categories', 'medicines.category_id', '=', 'categories.id')
        ->join('age_groups', 'medicines.age_group_id', '=', 'age_groups.id')
        ->where('books_in.id', $id)
        ->select('medicines.id', 'generic_name', 'medicine_name', 'name_category',
            'name_age_group', 'name_type', 'caliber', 'composition', 'alternative_medicine',
            'indications', 'product_country', 'manufacturer_company', 'image', 'bar_code',
            'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.medicine.show_details', compact('details'));
    }

    /**
     * Show all the batches that entered the pharmacy
     * 
     */
    public function showBatches($id) 
    {
        $user = auth()->user();
        
        $batches = $this -> getProductInPharmacy(new Medicine())
        ->join('types', 'medicines.type_id', '=', 'types.id')
        ->join('categories', 'medicines.category_id', '=', 'categories.id')
        ->join('age_groups', 'medicines.age_group_id', '=', 'age_groups.id')
        ->where('medicines.id', $id)
        ->where('books_in.branch_id', $user->branch_id)
        ->select('books_in.id', 'medicine_name', 'warehouses.name as name_warehouse', 'selling_price', 'purchasing_price', 'expired_date',
            'production_date', 'amount', 'product_place_id', 'books_in.date')->get();

        return view('product.medicine.show_batches', compact('batches'));
    }
}