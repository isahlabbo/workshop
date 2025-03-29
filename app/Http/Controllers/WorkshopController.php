<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    public function view($workshopId)
    {
        return view('programme.workshop.view',['workshop'=>Workshop::find($workshopId)]);
    }

    public function index()
    {
        return view('programme.workshop.index');
    }

    public function update(Request $request, $workshopId)
    {
        $workshop = Workshop::find($workshopId);
        $workshop->update([
            'title'=>$request->title,
            'programme_id'=>$request->programme,
            'description'=>$request->description,
        ]);
        return redirect()->route('workshop.index')->withToastSuccess('Workshop Updated');
    }
}
