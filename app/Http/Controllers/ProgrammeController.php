<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate(['programme'=>'required']);

        $programme = Programme::find($request->programme);

        if($programme){
            return redirect()->route('programme.workshops', [$programme->id]);
        }

        return redirect()->route('dashboard');
    }

    public function workshops($programmeId)
    {
        return view('programme.workshops',['programme'=>Programme::find($programmeId)]);
    }
}
