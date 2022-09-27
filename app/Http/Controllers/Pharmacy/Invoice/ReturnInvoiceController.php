<?php

namespace App\Http\Controllers\Pharmacy\Invoice;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Traits\UserJobTrait;

use App\Models\Cart;
use App\Models\CartReturn;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\ReturnInvoice;
use App\Models\IrIp;
use App\Models\Branch;
use App\Models\BookIn;

class ReturnInvoiceController extends Controller
{
    use UserJobTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * delete return invoice
     * 
     */
    public function delete($id)
    {
        $invoice = ReturnInvoice::find($id);
        $title ="this user delete_returnInvoice where id  ".$invoice->id;
        $this->userJob($title);
        $invoice->delete();
        return back();
    }

    /**
     * show all return invoices
     * 
     */
    public function all($type_file, Request $request)
    {
        $pharmacies = Branch::where('type',1)->get();

        if($request->has('start_date') && $request->has('end_date'))
        {
            $title = "All Return Invoice Between ". $request->start_date. " - ". $request->end_date;;

            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $invoices = ReturnInvoice::whereBetween('created_at',[$start_date,$end_date])->get();
        }
        else
        {
            $title = "All Return Invoice";

            $invoices = ReturnInvoice::all();
        }

        if($type_file == "report")
            return view('pharmacy.report.return_invoice_report', compact('invoices','pharmacies', 'title'));

        else if($type_file == "list")
            return view('pharmacy.returnInvoice.all', compact('invoices', 'pharmacies', 'title'));
        
        return 1;
    }

    /**
     * show return invoices in pharmacy
     * 
     */
    public function allInPharmacy($type_file, Request $request) 
    {
        $pharmacies = Branch::where('type',1)->get();

        $branch_id = auth()->user()->branch_id;

        if($request->has('start_date') && $request->has('end_date'))
        {
            $title = "Return Invoice List In Pharmacy Between ". $request->start_date. " - ". $request->end_date;;

            $start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request->end_date)->toDateTimeString();
            $invoices = ReturnInvoice::where('branch_id',$branch_id)->whereBetween('created_at',[$start_date,$end_date])->get();
        }
        else
        {
            $title = "Return Invoice List In Pharmacy";

            $invoices = ReturnInvoice::where('branch_id',$branch_id)->get();
        }

        if($type_file == "report")
            return view('pharmacy.report.return_invoice_report', compact('invoices','pharmacies', 'title'));

        else if($type_file == "list")
            return view('pharmacy.returnInvoice.all', compact('invoices', 'pharmacies', 'title'));
        
        return 1;
    }

    /**
     * show return invoices in specific pharmacy
     * 
     */
    public function showReturnInvoice($id)
    {
        $invoice = ReturnInvoice::find($id);
        return view('pharmacy.returnInvoice.display_return_invoice', compact('invoice'));
    }

    /**
     * return product from customer to pharmacy
     * 
     */
    public function returnProducts($I_P, Request $request) 
    {
        $I_P = InvoiceProduct::find($I_P);

        $Invoice = Invoice::find($I_P->invoice['id']);

        if (session()->has('cart_return'))
        {
            $cart = new CartReturn(session()->get('cart_return'));
            if($Invoice)
            {
                if(! ( $Invoice->customer['id'] == $cart->customer ))
                {
                    return redirect()->back()->with([
                    'message' =>'this cart to another customer',
                    'alert-type' => 'danger']);
                }
            }
        }
        else
        {
            $cart = new CartReturn();

            if($Invoice)
            {
                $cart->addCustomer($Invoice->customer['id']);
            }
            else
            {
                return "runn";
            }
        }

        $cart->add($I_P,$request->num_return);
        session()->put('cart_return', $cart);
        return redirect()->back();
    }

    /**
     * show all product in cart that we want to return it
     * 
     */
    public function showReturnCart() 
    {
        if (session()->has('cart_return'))
        {
            $cart = new Cart(session()->get('cart_return'));
        }
        else
        {
            $cart = null;
        }

        return view('pharmacy.returnInvoice.add', compact('cart'));
    }

    /**
     * put product in cart to return
     * 
     */
    public function removeProduct(InvoiceProduct $IP)
    {
        $cart = new CartReturn(session()->get('cart_return'));
        $cart->remove($IP->id);

        if ($cart->totalQty <= 0)
        {
            session()->forget('cart_return');
        }
        else
        {
            session()->put('cart_return', $cart);
        }

        return redirect()->route('cartReturn.show')->with('success', 'Product was removed');
    }

    /**
     * add return invoice
     * 
     */
    public function returnInvoice()
    {
        if (session()->has('cart_return'))
        {
            $cart = new CartReturn(session()->get('cart_return'));
            $RI = ReturnInvoice::create(array(
            'customer_id' => $cart->customer,
            'user_id' => auth()->guard('web')->user()->id,
            'branch_id' => auth()->guard('web')->user()->branch_id,
            'total_due' => $cart->totalPrice,
            'total_num' => $cart->totalQty,
            ));

            if(is_array($cart) || is_object($cart))
            {
                foreach ($cart as  $value)
                {
                    if(is_array($value) || is_object($value))
                    {
                        foreach ($value as $value1)
                        {
                            IrIp::create(array(
                            'ip_id' => $value1['I_P']->id,
                            'ri_id' => $RI->id,
                            'num_pr' => $value1['qty']));

                            $I_P = InvoiceProduct::where('invoice_id', '=', $value1['I_P']->invoice_id)->where('bookIn_id','LIKE',$value1['I_P']->bookIn_id)->first();

                            if($I_P)
                            {
                                $I_P->product_return += $value1['qty'];
                                $I_P->save();
                                $d = BookIn::find($value1['I_P']->bookIn_id)->increment('amount', $value1['qty']);
                            }
                        }
                    }
                }

                session()->forget('cart_return');
                return redirect()->back()->with([
                'message' =>'buy successfully',
                'alert-type' => 'success']);
            }
        }
    }

}
