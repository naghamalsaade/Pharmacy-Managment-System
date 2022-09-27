<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Traits\UserJobTrait;

use App\Models\Branch;
use App\Models\ReturnInvoice;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\MedicalFood;
use App\Models\MedicalSupply;
use App\Models\CosmeticProduct;
use App\Models\Reckon;
use App\Traits\ProductTrait;

class PharmacyController extends Controller
{
    use UserJobTrait, ProductTrait;

    /**
     * show all pharmacies
     * 
     */
    public function all()
    {
        $title = "Pharmacy List";
        $branches = Branch::where('type', '1')
        ->select('id', 'name', 'email', 'location_id', 'type', 'active')->get();

        return view('branch.all', compact('branches', 'title'));
    }

    /**
     * show all customers in specific pharmacy
     * 
     */
    public function allCustomer($branch_id)
    {
        $pharmacy = Branch::find($branch_id);

        $title = "All Customer In Pharmacy : ". $pharmacy->name;

        $pharmacies = Branch::where('type', '1')->where('active',1)->get(); 
        
        $customers = Customer::join('invoices','customers.id', '=', 'invoices.customer_id')
        ->where('invoices.branch_id', $branch_id )
        ->select('customers.id', 'name', 'mobile', 'reckoning', 'active')->distinct()->get();
        
        return view('pharmacy.customer.all', compact('customers', 'title', 'pharmacies'));
    }

    /**
     * show all customers that have reckoning in specific pharmacy
     * 
     */
    public function customerHaveReckon($branch_id)
    {
        $pharmacy = Branch::find($branch_id);
        
        $title = "All Customers Who Have Debts In Pharmacy : ". $pharmacy->name;

        $customers = Customer::join('invoices', 'invoices.customer_id', '=', 'customers.id')
        ->where('invoices.branch_id', $branch_id )->where('reckoning', '!=', '0')
        ->select('customers.id', 'name', 'mobile', 'reckoning', 'active')->get();
        
        return view('pharmacy.customer.all', compact('customers', 'title'));
    }

    /**
     * show all medicines in specific pharmacy
     * 
     */
    public function allMedicine($pharmacy_id)
    {
        $pharmacy = Branch::find($pharmacy_id);
        $title = "Medicin List In Pharmacy: ". $pharmacy->name;

        $medicines = $this -> getProductInPharmacy(new Medicine())
        ->join('types', 'medicines.type_id', '=', 'types.id')
        ->join('categories', 'medicines.category_id', '=', 'categories.id')
        ->join('age_groups', 'medicines.age_group_id', '=', 'age_groups.id')
        ->where('books_in.branch_id', $pharmacy_id)
        ->select('medicines.id', 'generic_name', 'medicine_name', 'name_category', 'name_age_group', 'name_type',
            'caliber', 'composition', 'alternative_medicine', 'indications', 'product_country', 'manufacturer_company',
            'image', 'bar_code')->distinct()->get();

        return view('product.medicine.all', compact('medicines', 'title'));
    }

    /**
     * show all medical supplies in specific branch
     * 
     */
    public function allSupply($pharmacy_id)
    {
        $pharmacy = Branch::find($pharmacy_id);
        $title = "Medical Supply List In Pharmacy: ". $pharmacy->name;

        $medicalSupplies =  $this -> getProductInPharmacy(new MedicalSupply())
        ->where('books_in.branch_id', $pharmacy_id)
        -> select('medical_supplies.id', 'medical_supplies.name', 'use_to', 'image', 'bar_code',
            'product_country', 'manufacturer_company')->distinct()->get();

        return view('product.medicalSupply.all', compact('medicalSupplies', 'title'));
    }

     /**
     * show all medical foods in specific branch
     * 
     */
    public function allFood($pharmacy_id)
    {
        $pharmacy = Branch::find($pharmacy_id);
        $title = "Medical Food List In Pharmacy: ". $pharmacy->name;

        $medicalFoods =  $this -> getProductInPharmacy(new MedicalFood())
        ->where('books_in.branch_id', $pharmacy_id)
        ->select('medical_foods.id', 'medical_foods.name', 'adverse_effects',
            'storage', 'image', 'bar_code',
            'product_country', 'manufacturer_company')->distinct()->get();

        return view('product.medicalFood.all', compact('medicalFoods', 'title'));
    }

     /**
     * show all cosmetic products in specific branch
     * 
     */
    public function allCosmetic($pharmacy_id)
    {
        $pharmacy = Branch::find($pharmacy_id);
        $title = "Cosmetic Product List In Pharmacy: ". $pharmacy->name;

        $cosmeticProducts = $this -> getProductInPharmacy(new CosmeticProduct())
        ->where('books_in.branch_id', $pharmacy_id)
        -> select('cosmetic_products.id', 'cosmetic_products.name', 'ingredients',
            'description', 'image', 'bar_code',
            'product_country', 'manufacturer_company')->distinct()->get();

        return view('product.cosmeticProduct.all', compact('cosmeticProducts', 'title'));
    }

    /**
     * show all invoices in specific pharmacy
     * 
     */
    public function allInvoice($type_file, Request $request, $branch_id)
    {
        $pharmacy = Branch::find($branch_id);

        $pharmacies = Branch::where('type',1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $title = "Invoice List Between ". $request->start_date. " - ". $request->end_date;

            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])
            ->where('branch_id',$branch_id)->get();
        }
        else
        {
            $title = "Invoice List In Pharmacy: ". $pharmacy->name;
            $invoices = Invoice::where('branch_id',$branch_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.invoice_report', compact('invoices','pharmacies', 'title'));

        else if($type_file == "list")
            return view('pharmacy.invoice.all', compact('invoices', 'title'));
        
        return 1;
    }

    /**
     * show all return invoices in specific pharmacy
     * 
     */
    public function allReturnInvoice($type_file, Request $request, $branch_id)
    {
        $pharmacy = Branch::find($branch_id);

        $pharmacies = Branch::where('type',1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $title = "Return Invoice Between ". $request->start_date. " - ". $request->end_date;

            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $invoices = ReturnInvoice::whereBetween('created_at',[$start_date,$end_date])
            ->where('branch_id',$branch_id)->get();
        }
        else
        {
            $title = "Return Invoice List In Pharmacy: ". $pharmacy->name;
            $invoices = ReturnInvoice::where('branch_id', $branch_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.return_invoice_report', compact('invoices','pharmacies', 'title'));

        else if($type_file == "list")
            return view('pharmacy.returnInvoice.all', compact('invoices', 'title'));
        
        return 1;
    }

    /**
     * show all reckonings in specific pharmacy
     * 
     */
    public function allReckoning($branch_id)
    {
        $pharmacy = Branch::find($branch_id);

        $title = "Debt Invoices List In Pharamcy : ". $pharmacy->name;

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->join('invoices', 'invoices.customer_id', '=', 'customers.id')
        ->where('invoices.branch_id', $branch_id)->where('b', 1)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
       return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show all payments in specific pharmacy
     * 
     */
    public function allPayment($branch_id)
    {
        $pharmacy = Branch::find($branch_id);

        $title = "Payments List In Pharamcy : ". $pharmacy->name;

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->join('invoices', 'invoices.customer_id', '=', 'customers.id')
        ->where('invoices.branch_id', $branch_id)->where('b', 0)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
        return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }
}
