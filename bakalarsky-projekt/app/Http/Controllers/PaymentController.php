<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    //
    function addData(Request $request)
    {
        $payment = new Payment;

        $payment ->name=$request->name;
        $payment ->stripe_price=$request->stripe_price;
        $payment ->save();

    }
}
