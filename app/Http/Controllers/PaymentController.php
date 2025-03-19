<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EdwardMuss\Rave\Facades\Rave as Flutterwave;
use Auth;


class PaymentController extends Controller
{
    public function authorizePayment(Request $request)
    {
        
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $request->amount,
            'email' => Auth::user()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('workshop.payment.callback'),
            'customer' => [
                'email' => Auth::user()->email,
                "phone_number" => $request->phone,
                "name" => Auth::user()->name
            ],

            "customizations" => [
                "title" => 'Workshop Payment',
                "description" => $request->title
            ]
        ];

        $payment = Flutterwave::initializePayment($data);

        dd($payment);
        if ($payment['status'] !== 'success') {
            return redirect()->route('dashboard')->withError($payment['message']);
        }

        return redirect($payment['data']['link']);
    }

    public function callback($workId)
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
            
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $transaction = Flutterwave::verifyTransaction($transactionID);

            Work::find($workId)->update([
                'paid'=>$transaction['data']['amount'],
                ]);
            // redirect to the application route
            return redirect()->route('dashboard')->withSuccess('Payment Successful');
        }
        
        

    }
}
