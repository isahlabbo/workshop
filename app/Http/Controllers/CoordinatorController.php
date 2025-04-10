<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;

class CoordinatorController extends Controller
{
    public function index()
    {
        return view('coordinator.index');
    }

    public function register(Request $request)
    {
       $request->validate(['facilitator'=>'required', 'programme'=>'required']);
       
       $programme = Programme::find($request->programme);

       $programme->coordinators()->firstOrCreate(['user_id'=>$request->facilitator]);

       return redirect()->route('coordinator.index')->withToastSuccess('Coordinator Registered');
    }
}
