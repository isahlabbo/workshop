<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;

class BootcampController extends Controller
{
    public function index()
    {
        return view('programme.bootcamp.index');
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
            'programme'=>'required',
        ]);
        $bootcamp = Bootcamp::find($bootcampId);
        $bootcamp->update([
            'title'=>$request->title,
            'programme_id'=>$request->programme,
            'description'=>$request->description,
        ]);
        return redirect()->route('bootcamp.index')->withToastSuccess('Bootcamp Updated');
    }

    public function register(Request $request)
    {
        $request->validate([
            'icon'=>'required',
            'title'=>'required',
            'description'=>'required',
            'programme'=>'required',
        ]);

        Bootcamp::firstOrCreate([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'programme_id'=>$request->programme,
            'description'=>$request->description,
        ]);
        return redirect()->route('bootcamp.index')->withToastSuccess('Bootcamp Registered');
    }

    public function delete($bootcampId)
    {
        
        $bootcamp = Bootcamp::find($bootcampId);
        $bootcamp->delete();
        return redirect()->route('bootcamp.index')->withToastSuccess('Bootcamp Deleted');
    }
}
