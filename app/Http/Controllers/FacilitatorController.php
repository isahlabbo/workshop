<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as Facilitator;
use Illuminate\Support\Facades\Hash;

class FacilitatorController extends Controller
{
    public function index()
    {
        return view('facilitator.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'password'=>'required',
        ]);

        Facilitator::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'role'=>'facilitator'
        ]);

        return redirect()->route('facilitator.index')->withToastSuccess('Facilitator Registered');
    }

    public function update(Request $request, $facilitatorId)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);

        $facilitator = Facilitator::find($facilitatorId);
        $facilitator->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        if($request->password){
            $facilitator->update([ 'password'=>Hash::make($request->password)]);
        }

        return redirect()->route('facilitator.index')->withToastSuccess('Facilitator Updated');
    }

    public function delete($facilitatorId)
    {

        $facilitator = Facilitator::find($facilitatorId);
        $facilitator->delete();

        return redirect()->route('facilitator.index')->withToastSuccess('Facilitator Deleted');
    }
}
