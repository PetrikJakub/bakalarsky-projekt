<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('stripe');
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        echo($request->price);
        Stripe\Charge::create ([
           "amount" => $request->price,
            "currency" => "eur",
            "source" => $request->stripeToken,
            "description" => $request->user()->email,





//            "customer" => $request->user()->name

//            "description" => "Making test payment."
        ]);

        Session::flash('success', 'Platba prebehla úspešne.');

        return back();
    }
}
