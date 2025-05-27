<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('application.index');
    }

    public function schedule($applicationId)
    {
        $application = Application::find($applicationId);

        $application->programme()->allocateThisParticipant($application);

        return redirect()->route('dashboard')->withToastSuccess('Re-schedule Request Sent');
    }
}
