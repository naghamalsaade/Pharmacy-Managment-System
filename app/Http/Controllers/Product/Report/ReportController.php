<?php

namespace App\Http\Controllers\Product\Report;

use App\Http\Controllers\Controller;

use App\Models\CosmeticProduct;
use App\Models\MedicalFood;
use App\Models\MedicalSupply;
use App\Models\Medicine;
use App\Traits\ProductTrait;

use Carbon\Carbon;

class ReportController extends Controller
{
    use ProductTrait;

    /* --------------------------------------------------------------------------
                            Goods and Products Reports
     --------------------------------------------------------------------------*/

    /**
     * A total report on the quantities of medicines in a particular branch
     * 
     */
    public function medicineAmount()
    {
        $user = auth()->user();

        $medicines = $this->getProductInPharmacy(new Medicine())
        ->where('books_in.branch_id', $user->branch_id)
        ->select('medicines.id',
            'generic_name', 'amount')->get()->groupBy('id');

        return view('product.reports.medicine_amount', compact('medicines'));
    }

    /**
     * A total report on the quantities of medical supplies in a particular branch
     * 
     */
    public function medicalSupplyAmount()
    {
        $user = auth()->user();

        $medicalSupplies = $this->getProductInPharmacy(new MedicalSupply())
        ->where('books_in.branch_id', $user->branch_id)
        ->select('medical_supplies.id',
            'medical_supplies.name', 'amount')->get()->groupBy('id');

        return view('product.reports.medical_supply_amount', compact('medicalSupplies'));
    }

    /**
     * A total report on the quantities of medical foods in a particular branch
     * 
     */
    public function medicalFoodAmount()
    {
        $user = auth()->user();

        $medicalFoods = $this->getProductInPharmacy(new MedicalFood())
        ->where('books_in.branch_id', $user->branch_id)
        ->select('medical_foods.id',
            'medical_foods.name', 'amount')->get()->groupBy('id');

        return view('product.reports.medical_food_amount', compact('medicalFoods'));
    }

    /**
     * A total report on the quantities of cosmetic products in a particular branch
     * 
     */
    public function cosmeticProductAmount()
    {
        $user = auth()->user();

        $cosmeticProducts = $this->getProductInPharmacy(new CosmeticProduct())
        ->where('books_in.branch_id', $user->branch_id)
        ->select('cosmetic_products.id',
            'cosmetic_products.name', 'amount')->get()->groupBy('id');

        return view('product.reports.cosmetic_product_amount', compact('cosmeticProducts'));
    }
    #####################################################

    /**
     * Total report of expired medicines
     * 
     */
    public function medicineExpired()
    {
        $user = auth()->user();

        $medicines = $this->getProductInPharmacy(new Medicine())
        ->where('buy_bill_products.expired_date', '<', Carbon::today())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('books_in.id', 'generic_name', 'amount', 'expired_date', 'warehouses.name as name_warehouse')
        ->get();

        return view('product.reports.expired_medicine', compact('medicines'));
    }

    /**
     * Total report of expired medical foods
     * 
     */
    public function medicalFoodExpired()
    {
        $user = auth()->user();

        $medicalFoods = $this->getProductInPharmacy(new MedicalFood())
        ->where('buy_bill_products.expired_date', '<', Carbon::today())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('books_in.id','medical_foods.name', 'amount', 'expired_date', 'warehouses.name as name_warehouse')
        ->get();

        return view('product.reports.expired_medical_food', compact('medicalFoods'));
    }

    /**
     * Total report of expired cosmetic products
     * 
     */
    public function cosmeticProductExpired()
    {
        $user = auth()->user();

        $cosmeticProducts = $this->getProductInPharmacy(new CosmeticProduct())
        ->where('buy_bill_products.expired_date', '<', Carbon::today())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('books_in.id', 'cosmetic_products.name', 'amount', 'expired_date', 'warehouses.name as name_warehouse')
        ->get();

        return view('product.reports.expired_cosmetic_product', compact('cosmeticProducts'));
    }
    ######################################################

    /**
     * A total report of the medicines that are close to being sold out
     * 
     */
    public function medicineOutOfStock()
    {
        $user = auth()->user();

        $medicines = $this->getProductInPharmacy(new Medicine())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('medicines.id', 'generic_name', 'amount')
        ->get()->groupBy('id');

        $medicines = collect($medicines);
        $results =  $medicines -> filter(function ($value, $key){
            return $value -> sum('amount') < '10';
        });

        return view('product.reports.medicine_out_of_stock', compact('results'));
    }

    /**
     * A total report of the medical supplies that are close to being sold out
     * 
     */
    public function medicalSupplyOutOfStock()
    {
        $user = auth()->user();

        $medicalSupply = $this->getProductInPharmacy(new MedicalSupply())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('medical_supplies.id', 'medical_supplies.name', 'amount')
        ->get()->groupBy('id');

        $medicalSupply = collect($medicalSupply);
        $results =  $medicalSupply -> filter(function ($value, $key){
            return $value -> sum('amount') < '10';
        });

        return view('product.reports.medical_supply_out_of_stock', compact('results'));
    }

    /**
     * A total report of the medical foods that are close to being sold out
     * 
     */
    public function medicalFoodOutOfStock()
    {
        $user = auth()->user();

        $medicalFoods = $this->getProductInPharmacy(new MedicalFood())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('medical_foods.id', 'medical_foods.name', 'amount')
        ->get()->groupBy('id');

        $medicalFoods = collect($medicalFoods);
        $results =  $medicalFoods -> filter(function ($value, $key){
            return $value -> sum('amount') < '10';
        });

        return view('product.reports.medical_food_out_of_stock', compact('results'));
    }

    /**
     * A total report of the cosmetic products that are close to being sold out
     * 
     */
    public function cosmeticProductOutOfStock()
    {
        $user = auth()->user();

        $cosmeticProducts = $this->getProductInPharmacy(new CosmeticProduct())
        ->where('books_in.branch_id', $user->branch_id)
        ->where('books_in.amount', '!=', '0')
        ->select('cosmetic_products.id', 'cosmetic_products.name', 'amount')
        ->get()->groupBy('id');

        $cosmeticProducts = collect($cosmeticProducts);
        $results =  $cosmeticProducts -> filter(function ($value, $key){
            return $value -> sum('amount') < '10';
        });

        return view('product.reports.cosmetic_product_out_of_stock', compact('results'));
    }
}

















