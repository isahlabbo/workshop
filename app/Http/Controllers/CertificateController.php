<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class CertificateController extends Controller
{
    public function view($applicationId)
    {
        $application = Application::find($applicationId);
       
        if($message = $application->hasErrorFromCertificateDisplay()){
            return back()->withToastWarning($message);
        }

        return view('application.certificate.view',['application'=>$application]);
    }
}
