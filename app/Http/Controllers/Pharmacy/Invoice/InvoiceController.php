<?php

namespace App\Http\Controllers\Pharmacy\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Traits\UserJobTrait;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\InvoiceProduct;
use App\Models\Reckon;
use App\Models\Branch;
use App\Models\BookIn;

use Illuminate\Support\Carbon;

class InvoiceController extends Controller
{
    use UserJobTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * add invoice
     * 
     */
    public function create() 
    {
        $branch_id = Auth::user()->branch_id;
        $customers = Customer::all();
        return view('pharmacy.invoice.add', compact('customers','branch_id'));
    }

    /**
     * save invoice
     * 
     */
    public function store(Request $request)
    {
        $invoice = Invoice::create(array(
        'user_id' => auth()->guard('web')->user()->id,
        'branch_id' => auth()->guard('web')->user()->branch_id,
        'customer_id' => $request->customer,
        'total_amount' => $request->total_amount,
        'total_due' => $request->due_amount,
        'paid' => $request->paid_amount,
        'total_num' => array_sum($request->quantity),
        'discount_value' => $request->invoice_discount,
        ));

        $Customer = Customer::find($request->customer);
        $Customer->reckoning += $request->remaining_amount;
        $Customer->save();
        $title = "this user add invoice where id  ".$invoice->id;
        $this->userJob($title);

        for($i = 0; $i < count($request->product_name); $i++)
        {
            InvoiceProduct::create([
            'invoice_id' => $invoice->id,
            'bookIn_id' => $request->id_product[$i],
            'product_num' => $request->quantity[$i],
            'product_price' => $request->price[$i],
            'product_name' => $request->product_name[$i],
            'discount_value' => $request->discount[$i],
            ]);

            BookIn::find($request->id_product[$i])->decrement('amount', $request->quantity[$i]);
        }

        Reckon::create([
            'customer_id' => $request->customer,
            'paid' => $request->remaining_amount,
            'branch_id' => auth()->user()->branch_id,
            'b' => 1
        ]);

        if($request->radio == 1)
        {
            return view('pharmacy.invoice.stripe', ['amount' => $request->paid_amount ]);
        }
        else
        {
            return back();
        }
    }

    /**
     * show all invoices in all pharmacies
     * 
     */
    public function all($type_file, Request $request)
    {
        $pharmacies = Branch::where('type', 1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {

            $title = "All Invoice Between ". $request->start_date. " - ". $request->end_date;

            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])->get();
        }
        else
        {
            $title = "All Invoice";
            $invoices = Invoice::all();
        }

        if($type_file == "report")
            return view('pharmacy.report.invoice_report', compact('invoices','pharmacies', 'title'));

        else if($type_file == "list")
            return view('pharmacy.invoice.all', compact('invoices', 'pharmacies', 'title'));
            
        return 1;
    }

    /**
     * show all invoices in pharmacy
     * 
     */
    public function allInPharmacy($type_file, Request $request)
    {
        $pharmacies = Branch::where('type',1)->get();

        $branch_id = auth()->user()->branch_id;

        if($request->has('start_date') && $request->has('end_date'))
        {
            $title = "Invoice List In Pharmacy Between ". $request->start_date. " - ". $request->end_date;

            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();

            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])
            ->where('branch_id',$branch_id)->get();
        }
        else
        {
            $title = "Invoice List In Pharmacy";
            $invoices = Invoice::where('branch_id',$branch_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.invoice_report', compact('invoices','pharmacies', 'title'));

        else if($type_file == "list")
            return view('pharmacy.invoice.all', compact('invoices', 'pharmacies', 'title'));
        
        return 1;
    }

    /**
     * delete invoice
     * 
     */
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $title = "this user delete invoice where id  ".$invoice->id;
        $this->userJob($title);
        $invoice->delete();
        return back();
    }

    /**
     * show specific invoice
     * 
     */
    public function showInvoice($id) 
    {
        $invoice = Invoice::find($id);
        return view('pharmacy.invoice.display_invoice', compact('invoice'));
    }

    /**
     * print specific invoice
     * 
     */
    public function printInvoice($id)
    {
        $invoice = Invoice::find($id);
        return view('pharmacy.invoice.print_invoice', compact('invoice'));
    }

    /**
     * show all debt Invoices
     * 
     */
    public function allDebtInvoices()
    {
        $title = "All Debt Invoices";

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->where('b', 1)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
       return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show all debt Invoices in pharmacy
     * 
     */
    public function allDebtInvoicesInPharmacy()
    {
        $title = "All Debt Invoices In Pharmacy";

        $user = auth()->user();

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->where('branch_id', $user->branch_id)->where('b', 1)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
       return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show all repayments
     * 
     */
    public function allRepayments()  
    {
        $title = "All Repayments";

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->where('b', 0)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
        return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show all repayments in pharmacy
     * 
     */
    public function allRepaymentsInPharmacy()
    {
        $title = "All Repayments In Parmacy";

        $user = auth()->user();

        $debts = Reckon::join('customers', 'customers.id', '=', 'reckons.customer_id')
        ->where('branch_id', $user->branch_id)->where('b', 0)
        ->select('reckons.id', 'reckons.customer_id', 'customers.name', 'reckons.paid', 'reckons.updated_at')->get();
        return view('pharmacy.invoice.all_debt_invoices', compact('debts', 'title'));
    }

    /**
     * show all delayed invoices
     * 
     */
    public function allDelayedInvoice(Request $request)
    {
        $branches = Branch::where('type', 1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])->whereColumn('total_due', '>', 'paid')->get();
        }

        else
        {
            $invoices = Invoice::whereColumn('total_due', '>', 'paid')->get();
        }
        
        return view('pharmacy.report.delayed_invoice_report', compact('invoices','branches'));
    }

    /**
     * show all delayed invoices in pharmacy
     * 
     */
    public function delayedInvoiceInPharmacy(Request $request)
    {
        $branches = Branch::where('type', 1)->get();

        $branch_id = auth()->user()->branch_id;

        if($request->has('start_date') && $request->has('end_date'))
        {
            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $invoices = Invoice::whereBetween('created_at',[$start_date,$end_date])
            ->whereColumn('total_due', '>', 'paid')->where('branch_id',$branch_id)->get();
        }

        else
        {
            $invoices = Invoice::whereColumn('total_due', '>', 'paid')->where('branch_id',$branch_id)->get();
        }
        
        return view('pharmacy.report.delayed_invoice_report', compact('invoices','branches'));
    }

    /**
     * show all annual invoices
     * 
     */
    public function annualInvoice()
    {
        $branches = Branch::where('type', 1)->get();

        $invoices = Invoice::whereYear('created_at', date('Y'))->get();
        return view('pharmacy.report.annual_invoice_report',compact('invoices','branches'));
    }

    /**
     * show all annual invoices in pharmacy
     * 
     */
    public function annualInvoiceInPharmacy()
    {
        $branches = Branch::where('type', 1)->get();

        $branch_id = auth()->user()->branch_id;

        $invoices = Invoice::whereYear('created_at', date('Y'))->where('branch_id',$branch_id)->get();
        return view('pharmacy.report.annual_invoice_report',compact('invoices','branches'));
    }

    /**
     * delete loan (debt invoice | repayment)
     * 
     */
    public function deleteLoan($id)     
    {
        $reckon= Reckon::find($id);
        $title = "this user delete_loan where id  ".$reckon->id;
        $this->userJob($title);
        $reckon->delete();
        return back();
    }
}
