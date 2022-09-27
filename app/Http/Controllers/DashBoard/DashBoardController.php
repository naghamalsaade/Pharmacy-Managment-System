<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;

use App\Models\InvoiceProduct;
use App\Models\Invoice;
use App\Models\Reckon;
use App\Models\ReturnInvoice;
use App\Models\Branch;

use App\User;

use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function show()
    {
        $branches=Branch::all();

        $bestProducts= InvoiceProduct::groupBy('product_name')->selectRaw(' sum(product_num) as sum ,product_name  ')
        ->take(10)->orderBy('sum','DESC')->get();

        $months = Invoice::select( DB::raw('DATE_FORMAT(created_at, "%M") as month , sum(total_due) as total,sum(total_num) as totalPaid ,sum(id) as totalCount '))
        ->groupBy('month')
        ->get();

        $invoices=Invoice::all();
        $AdminUsers = User::whereHas(
        'roles', function($q){
            $q->where('name', 'admin');
        })->get();

        $users=User::all();
        $debts=Reckon::all();
        $Returninvoices=ReturnInvoice::all();
        return view('index',compact('months','invoices','bestProducts','AdminUsers','users','branches','debts','Returninvoices'));
    }
}
