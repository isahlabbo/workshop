<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ParticipantController extends Controller
{
    public function index()
    {
        return view('participant.index');
    }

    public function update(Request $request, $participantId)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);

        $participant = User::find($participantId);

        $participant->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
        ]);

        if($request->password){
            $participant->update(['name'=>Hash::make($request->password)]);
        }
        
        return redirect()->route('participant.index')->withToastSuccess('Participant Updated');    
    }
}
