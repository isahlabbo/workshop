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
}
