<?php

namespace App\Http\Controllers\Pharmacy\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Branch;
use App\Models\Invoice;
use App\Models\ReturnInvoice;
use App\Models\Reckon;

use App\Traits\UserJobTrait;

class CustomerController extends Controller
{
    use UserJobTrait;

    /**
     * add customer
     * 
     */
    public function create()  
    {
        return view('pharmacy.customer.add');
    }

    /**
     * save customer
     * 
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->mobile = $request->phone;
        $customer->name = $request->name;
        $customer->reckoning = 0;
        $customer->active = $request->radio;
        $customer->save();
        $title = "this user add customer".$request->name."where id  ".$customer->id;
        $this->userJob($title);
        return redirect('/customer/all');
    }

    /**
     * show all customers
     * 
     */
    public function all()  
    {
        $title = "All Customer";

        $pharmacies = Branch::where('type', '1')->where('active',1)->get();

        $customers = Customer::all();

        return view('pharmacy.customer.all', compact('customers', 'pharmacies', 'title'));
    }

    /**
     * edit customer
     * 
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('pharmacy.customer.edit', compact('customer'));
    }

    /**
     * update customer
     * 
     */
    public function update($id, Request $request)
    {
        $customers = Customer::find($id);
        $customers->mobile = $request->phone;
        $customers->name = $request->name;
        $customers->active = $request->radio;
        $customers->save();
        $title = "this user update customer".$request->name."where id  ".$customers->id;
        $this->userJob($title);
        return redirect('/customer/all');
    }

    /**
     * delete customer
     * 
     */
    public function delete($id)
    {
        $customers = Customer::find($id);
        $title = "this user delete customer".$customers->name."where id  ".$customers->id;
        $this->userJob($title);
        $customers->delete();
        return back();
    }

    /**
     * show customers in pharmacy
     * 
     */
    public function allInPharmacy()  
    {
        $title = "Customer Come To Pharamcy";

        $user = auth()->user();

        $pharmacies = Branch::where('type', '1')->where('active',1)->get(); 
        
        $customers = Customer::join('invoices','customers.id', '=', 'invoices.customer_id')
        ->where('invoices.branch_id', $user->branch_id)
        ->select('customers.id', 'name', 'mobile', 'reckoning', 'active')->distinct()->get();
        
        return view('pharmacy.customer.all', compact('customers', 'title', 'pharmacies'));
    }

    /**
     * show customers that have reckon
     * 
     */
    public function customerHaveReckon()  
    {
        $title = "All Customers Who Have Debts";

        $pharmacies = Branch::where('type', '1')->where('active',1);

        $customers = Customer::where('reckoning', '!=', '0')->get();

        return view('pharmacy.customer.all', compact('customers', 'pharmacies', 'title'));
    }
    
    /**
     * show customers that have reckon in pharmacy
     * 
     */
    public function haveReckonInPharmacy()  
    {
        $title = "Customers Who Have Debts In Pharmacy";

        $user = auth()->user();

        $pharmacies = Branch::where('type', '1')->where('active',1);


        $customers = Customer::join('invoices','customers.id', '=', 'invoices.customer_id')
        ->where('invoices.branch_id', $user->branch_id)->where('reckoning', '!=', '0')
        ->select('customers.id', 'name', 'mobile', 'reckoning', 'active')->distinct()->get();

        return view('pharmacy.customer.all', compact('customers', 'pharmacies', 'title'));
    }

    /**
     * show invoices for specific customer
     * 
     */
    public function allInvoice($type_file, Request $request, $customer_id)  
    {
        $branches = Branch::where('type', 1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])->where('customer_id', $customer_id)->get();
        }
        else
        {
            $invoices = Invoice::where('customer_id', $customer_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.invoice_report', compact('invoices','branches'));

        else if($type_file == "list")
            return view('pharmacy.invoice.all', compact('invoices'));
            
        return 1;
    }

    /**
     * show invoices for specific customer in specific pharmacy
     * 
     */
    public function allInvoiceInBranch($type_file, Request $request, $customer_id, $branch_id)  
    {
        $branches = Branch::where('type', 1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])
            ->where('customer_id', $customer_id)->where('branch_id', $branch_id)->get();
        }
        else
        {
            $invoices = Invoice::where('customer_id', $customer_id)->where('branch_id', $branch_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.invoice_report', compact('invoices','branches'));

        else if($type_file == "list")
            return view('pharmacy.invoice.all', compact('invoices'));
            
        return 1; 
    }

    /**
     * show return invoices for specific customer 
     * 
     */
    public function allReturnInvoice($type_file, Request $request, $customer_id) 
    {
        $branches = Branch::where('type',1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $invoices = ReturnInvoice::whereBetween('created_at',[$start_date,$end_date])->where('customer_id', $customer_id)->get();
        }
        else
        {
            $invoices = ReturnInvoice::where('customer_id', $customer_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.return_invoice_report', compact('invoices','branches'));

        else if($type_file == "list")
            return view('pharmacy.returnInvoice.all', compact('invoices'));
        
        return 1;
    }

    /**
     * show return invoices for specific customer in specific pharmacy
     * 
     */
    public function allReturnInvoiceInBranch($type_file, Request $request, $customer_id, $branch_id)  
    {
        $branches = Branch::where('type',1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $invoices = ReturnInvoice::whereBetween('created_at',[$start_date,$end_date])
            ->where('customer_id', $customer_id)->where('branch_id', $branch_id)->get();
        }
        else
        {
            $invoices = ReturnInvoice::where('customer_id', $customer_id)->where('branch_id', $branch_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.return_invoice_report', compact('invoices','branches'));

        else if($type_file == "list")
            return view('pharmacy.returnInvoice.all', compact('invoices'));
        
        return 1;
       
    }

    /**
     * show debt invoices for specific customer
     * 
     */
    public function allReckoning($customer_id)  
    {

        $title = "All Debt Invoices";

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->where('b', 1)->where('reckons.customer_id', $customer_id)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
       return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show debt invoices for specific customer in specific pharmacy
     * 
     */
    public function allReckoningInBranch($customer_id, $branch_id)  
    {

        $title = "All Debt Invoices";

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')->where('b', 1)
        ->where('reckons.customer_id', $customer_id)->where('branch_id', $branch_id)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
       return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show payments for specific customer
     * 
     */
    public function allPayment($customer_id)  
    {

        $title = "All Repayments";

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->where('b', 0)->where('reckons.customer_id', $customer_id)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
        return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show payments for specific customer in specific pharmacy
     * 
     */
    public function allPaymentInBranch($customer_id, $branch_id)  
    {

        $title = "All Repayments";

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')->where('b', 0)
        ->where('reckons.customer_id', $customer_id)->where('branch_id', $branch_id)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
        return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show all the products that the customer purchase
     * 
     */
    public function allProduct($customer_id) 
    {
        $products = Invoice::join('invoice_products','invoice_products.invoice_id','=','invoices.id')
        ->where('invoices.customer_id',$customer_id)
        ->select('invoice_products.invoice_id','invoices.created_at','invoice_products.id','invoice_products.product_name','invoice_products.product_num','invoice_products.product_price','invoice_products.product_return', 'invoices.branch_id')
        ->orderBy('invoice_products.product_name')
        ->orderBy('invoices.created_at')
        ->get();

        return view('pharmacy.customer.customer_purchase_list', compact('products')); 
    }

     /**
     * show all the products that the customer purchase from specific pharmacy
     * 
     */
    public function allProductInBranch($customer_id,  $branch_id) 
    {
        $products = Invoice::join('invoice_products','invoice_products.invoice_id','=','invoices.id')
        ->where('invoices.customer_id',$customer_id)->where('invoices.branch_id', $branch_id)
        ->select('invoice_products.invoice_id','invoices.created_at','invoice_products.id','invoice_products.product_name','invoice_products.product_num','invoice_products.product_price','invoice_products.product_return', 'invoices.branch_id')
        ->orderBy('invoice_products.product_name')
        ->orderBy('invoices.created_at')
        ->get();

        return view('pharmacy.customer.customer_purchase_list', compact('products')); 
    }

    /**
     * Pay off debt
     * 
     */
    public function paidReckon($id, Request $request)
    {
        $customer = Customer::find($id);
        if ($customer)
        {
            $customer->reckoning = $customer->reckoning-$request->paid;

            Reckon::create([
                'customer_id' => $customer->id,
                'paid' => $request->paid,
                'branch_id' => auth()->user()->branch_id,
                'b' => 1
            ]);

            $title = "this user paid_reckon customer".$customer->name."where id  ".$customer->id;

            $this->userJob($title);
            $customer->save();
            return redirect('/customer/all')->with([
            'message' => 'paid_successfully',
            'alert-type' => 'success'
            ]);
        }
        else
        {
            return redirect('/customer/all')->with([
            'message' =>'paid_failed',
            'alert-type' => 'danger'
            ]);
        }
    }
}
