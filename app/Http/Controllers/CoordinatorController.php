<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Coordinator;

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

    public function update(Request $request, $coordinatorId)
    {
       $request->validate(['facilitator'=>'required', 'programme'=>'required','status'=>'required']);
       
       $coordinator = Coordinator::find($coordinatorId);

       $coordinator->update([
           'user_id'=>$request->facilitator,
           'programme_id'=>$request->programme,
           'status'=>$request->status,
           ]);

       return redirect()->route('coordinator.index')->withToastSuccess('Coordinator Updated');
    }

    public function delete($coordinatorId)
    {
       
       
       $coordinator = Coordinator::find($coordinatorId);

       $coordinator->delete();

       return redirect()->route('coordinator.index')->withToastSuccess('Coordinator Deleted');
    }

}
