<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Programme;

class WorkshopController extends Controller
{
    public function view($workshopId)
    {
        return view('programme.workshop.view',['workshop'=>Workshop::find($workshopId)]);
    }

    public function index($programmeId)
    {
        return view('programme.workshop.index',['programme'=>Programme::find($programmeId)]);
    }

    public function update(Request $request, $workshopId)
    {
        $request->validate([
            'icon'=>'required',
            'title'=>'required',
            'description'=>'required',
            'programme'=>'required',
            'application'=>'required',
        ]);
        $workshop = Workshop::find($workshopId);
        $workshop->update([
            'title'=>$request->title,
            'programme_id'=>$request->programme,
            'description'=>$request->description,
            'application'=>$request->application,
        ]);
        return redirect()->route('programme.workshop.index',[$workshop->programme->id])->withToastSuccess('Workshop Updated');
    }

    public function register(Request $request, $programmeId)
    {
        $request->validate([
            'icon'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);

        $workshop = Workshop::firstOrCreate([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'programme_id'=>$programmeId,
            'description'=>$request->description,
        ]);
        $workshop->updateFees();

        return redirect()->route('programme.workshop.index' ,[$programmeId])->withToastSuccess('Workshop Registered');
    }

    public function delete($workshopId)
    {
        $workshop = Workshop::find($workshopId);
        $workshop->delete();
        foreach($workshop->workshopFees as $fee){
            $fee->delete();
        }
        return redirect()->route('programme.workshop.index',[$workshop->programme->id])->withToastSuccess('Workshop Deleted');
    }
}
