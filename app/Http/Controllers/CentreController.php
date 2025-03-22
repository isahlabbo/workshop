<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

class CentreController extends Controller
{
    public function index()
    {
        return view('centre.index');
    }

    public function register(Request $request)
    {
        $request->validate([
        "name" => "required",
        "address" => "required",
        "capacity" => "required",
        "contact" => "required"
        ]);

        Centre::firstOrCreate([
            'name'=>$request->name,
            'address'=>$request->address,
            'capacity'=>$request->capacity,
            'contact'=>$request->contact,
        ]);

        return redirect()->route('centre.index')->withToastSuccess('Centre Registered');
    }

    public function update(Request $request, $centreId)
    {
        $request->validate([
        "name" => "required",
        "address" => "required",
        "capacity" => "required",
        "contact" => "required"
        ]);

        Centre::find($centreId)->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'capacity'=>$request->capacity,
            'contact'=>$request->contact,
        ]);

        return redirect()->route('centre.index')->withToastSuccess('Centre Updated');
    }

    public function delete($centreId)
    {

        $centre = Centre::find($centreId);
        if(count($centre->schedules) >0){
            return redirect()->route('centre.index')->withToastError('Sorry, we cant delete this centre');
        }
        $centre->delete();
        return redirect()->route('centre.index')->withToastSuccess('Centre Deleted');
    }
}
