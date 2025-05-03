<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use App\Models\Programme;

class BootcampController extends Controller
{
    public function index($programmeId)
    {
        return view('programme.bootcamp.index',['programme'=>Programme::find($programmeId)]);
    }

    public function view($bootcampId)
    {
        return view('programme.bootcamp.view',['bootcamp'=>Bootcamp::find($bootcampId)]);
    }

    public function update(Request $request, $bootcampId)
    {
        $request->validate([
            'icon'=>'required',
            'title'=>'required',
            'description'=>'required',
            'application'=>'required',
        ]);
        $bootcamp = Bootcamp::find($bootcampId);
        $bootcamp->update([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
            'application'=>$request->application,
        ]);
        
        return redirect()->route('programme.bootcamp.index',[$bootcamp->programme->id])->withToastSuccess('Bootcamp Updated');
    }

    public function register(Request $request, $programmeId)
    {
        $request->validate([
            'icon'=>'required',
            'title'=>'required',
            'description'=>'required',
        ]);

       $bootcamp = Bootcamp::firstOrCreate([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'programme_id'=>$programmeId,
            'description'=>$request->description,
        ]);
        $bootcamp->updateFees();
        return redirect()->route('programme.bootcamp.index',[$programmeId])->withToastSuccess('Bootcamp Registered');
    }

    public function delete($bootcampId)
    {
        
        $bootcamp = Bootcamp::find($bootcampId);
        $bootcamp->delete();
        foreach($bootcamp->bootcampFees as $fee){
            $fee->delete();
        }
        return redirect()->route('programme.bootcamp.index',[$bootcamp->programme->id])->withToastSuccess('Bootcamp Deleted');
    }
}
