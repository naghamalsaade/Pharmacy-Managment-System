<?php
   
namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Stripe;

use App\Traits\UserJobTrait;

class StripePaymentController extends Controller
{
    use UserJobTrait;

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        $amount = 1000;
        return view('PharmacyBranch.Invoice.stripe', ['amount' => $amount]);
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        return $request->amount;

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
        "amount" => 100 * 100,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!'); 
        return back();
    }
}