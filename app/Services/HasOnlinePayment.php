<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Application;
use EdwardMuss\Rave\Facades\Rave as Flutterwave;
use Auth;

trait HasOnlinePayment{
    
    public function authorizePayment(Request $request)
    {
        $request->validate([
            'language'=>'required',
            'method'=>'required',
            'schedule'=>'required',
        ]);
        // initialize the application
        if($request->workshopId){
            $application = Auth::user()->applications()->firstOrCreate([
                'workshop_id'=>$request->workshopId,
            ]);
        }else{
            $application = Auth::user()->applications()->firstOrCreate([
                'bootcamp_id'=>$request->bootcampId,
            ]);
        }
        
        
        $application->update([
            'prefer_language'=>$request->language,
            'prefer_method'=>$request->method,
            'prefer_schedule'=>$request->schedule,
            'registration_no'=>$application->registrationNo(),
        ]);

        $coupon = Coupon::where(['code'=>$request->coupon, 'status'=>'active'])->first();
       
        $perecentOff = 0.0001;

        if($coupon){
            $application->update(['coupon_id'=>$coupon->id]);
            $coupon->update(['status'=>'used']);
            $perecentOff = $coupon->percentage;
        }

        
        if($perecentOff < 100){
        
        try {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();
        
        // Enter the details of the payment
        $data = [
            'payment_options' => 'card, banktransfer, USSD',
            'amount' => $request->amount - (($request->amount/100) * $perecentOff),
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
                "title" => $request->title.' Payment',
                "description" => $request->title
            ]
        ];

    
       
            $payment = Flutterwave::initializePayment($data);
        
            if ($payment['status'] !== 'success') {
                return redirect()->route('workshop.view', [$request->workshopId])
                    ->withError($payment['message']);
            }

            return redirect($payment['data']['link']);
        } catch (\Exception $e) {
            return redirect()->route('programme.workshop.view', [$request->workshopId])
                ->withError('Payment initialization failed. Please try again.');
        }

    }else{
        $payment = $application->payment()->firstOrCreate([
            'amount'=>$request->amount,
            'payment_type_id'=>6,
            'status'=> 'success'
        ]);

        $payment->paymentAttempts()->create([
            'message'=>'success',
            'method'=>'CARD Transaction',
            'ip_address'=>'102.91.77.252',
            'bank'=>'GUARANTY TRUST BANK Mastercard Naira Debit Card',
            'account'=>'539983'."******".'8157',
        ]);

        return redirect()->route('dashboard')->withToastSuccess('Application was successfull');
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

            $application->programme()->allocateThisParticipant($application);

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
        
    }
}