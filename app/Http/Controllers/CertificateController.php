<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class CertificateController extends Controller
{
    public function view($applicationId)
    {
        $application = Application::find($applicationId);
        $message = null;

        if($application->payment->status != 'success'){
            $message = 'Access to your certificate was restricted due to payment pls make your payment now';
        }

        if(!$application->certificate){
            $message = 'Your certificate was not publish, pls check back next time';
        }

        if(!$application->schedule){
            $message = 'Your Application was not schedule';
        }


        if(!$application->programme()->programme->activeCoordinator()){
            $message = 'There is no active coodinator for your programme';
        }

        if($message){
            return back()->withToastWarning($message);
        }

        return view('application.certificate.view',['application'=>$application]);
    }
}
