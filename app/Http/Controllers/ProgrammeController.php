<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    public function index()
    {
        return view('programme.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'type'=>'required',
            ]);

        $programme = Programme::firstOrCreate([
            'name'=>$request->name,
            'icon'=>$request->icon,
            'type'=>$request->type,
            ]);

        return redirect()->route('programme.index')->withToastSuccess('Programme Registered');
    }

    public function update(Request $request, $programmeId)
    {
        $request->validate([
            'name'=>'required',
            'icon'=>'required',
            'type'=>'required',
            ]);

        $programme = Programme::find($programmeId);
        $programme->update([
            'name'=>$request->name,
            'icon'=>$request->icon,
            'type'=>$request->type,
            ]);

        return redirect()->route('programme.index')->withToastSuccess('Programme Updated');
    }

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
