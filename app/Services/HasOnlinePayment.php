<?php
namespace App\Services;

trait HasOnlinePayment{
    
    public function authorizePayment(Request $request)
    {
        // initialize the application
        $application = Auth::user()->applications()->firstOrCreate([
            'workshop_id'=>$request->workshopId,
            'language'=>$request->language,
            'method'=>$request->method,
            'schedule'=>$request->schedule,
        ]);

        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $request->amount,
            'email' => Auth::user()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('payment.callback',[$application->id]),
            'customer' => [
                'email' => Auth::user()->email,
                'user_id'=>Auth::user()->id,
                'language'=>$request->language,
                'method'=>$request->method,
                'schedule'=>$request->schedule,
                'workshop_id'=>$request->workshopId,
                "phone_number" => $request->phone,
                "name" => Auth::user()->name
            ],

            "customizations" => [
                "title" => 'Workshop Payment',
                "description" => $request->title
            ]
        ];

    
        try {
            $payment = Flutterwave::initializePayment($data);
        
            if ($payment['status'] !== 'success') {
                return redirect()->route('workshop.view', [$request->workshopId])
                    ->withError($payment['message']);
            }

            return redirect($payment['data']['link']);
        } catch (\Exception $e) {
            return redirect()->route('workshop.view', [$request->workshopId])
                ->withError('Payment initialization failed. Please try again.');
        }
        
    }

    public function callback($applicationId)
    {
        
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
            
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $transaction = Flutterwave::verifyTransaction($transactionID);
            $application = Application::find($applicationId);
            $payment = $application->payment()->firstOrCreate([
                'amount'=>$transaction['data']['amount'],
                'payment_type_id'=>1,
                'status'=> $transaction['status']
            ]);

            $payment->paymentAttempts()->create([
                'message'=>$transaction['message'],
                'method'=>$transaction['data']['narration'],
                'ip_address'=>$transaction['data']['ip'],
                'bank'=>$transaction['data']['card']['issuer'],
                'account'=>$transaction['data']['card']['first_6digits']."******".$transaction['data']['card']['last_4digits'],
            ]);
           
            
            // redirect to the application route
            return redirect()->route('dashboard')->withSuccess('Payment Successful');
        }
/*
        array:3 [▼
  "status" => "success"
  "message" => "Transaction fetched successfully"
  "data" => array:21 [▼
    "id" => 1770428128
    "tx_ref" => "flw_174255533367dd48c5bdf60"
    "flw_ref" => "CatsolInstitute/RPPLNG17425590165153332"
    "device_fingerprint" => "e745a1d0ad2cdc32579fd8bae2558135"
    "amount" => 200
    "currency" => "NGN"
    "charged_amount" => 202.8
    "app_fee" => 2.8
    "merchant_fee" => 0
    "processor_response" => "Approved by Financial Institution"
    "auth_model" => "PIN"
    "ip" => "102.91.77.252"
    "narration" => "CARD Transaction "
    "status" => "successful"
    "payment_type" => "card"
    "created_at" => "2025-03-21T12:10:15.000Z"
    "account_id" => 2926920
    "card" => array:7 [▼
      "first_6digits" => "539983"
      "last_4digits" => "8157"
      "issuer" => "GUARANTY TRUST BANK Mastercard Naira Debit Card"
      "country" => "NIGERIA NG"
      "type" => "MASTERCARD"
      "token" => "flw-t1nf-b0ec552aebdf369944ffcd06e736e00a-k3n"
      "expiry" => "05/27"
    ]
    "meta" => array:1 [▼
      "__CheckoutInitAddress" => "https://checkout.flutterwave.com/v3/hosted/pay"
    ]
    "amount_settled" => 199.79
    "customer" => array:5 [▼
      "id" => 1146603518
      "name" => "isah labbo"
      "phone_number" => "08162463010"
      "email" => "isahlabbo22@gmail.com"
      "created_at" => "2025-03-20T12:26:53.000Z"
    ]
  ]
]
*/
        
        

    }
}