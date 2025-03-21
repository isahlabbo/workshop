<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HasOnlinePayment as PayOnline;
use EdwardMuss\Rave\Facades\Rave as Flutterwave;
use Auth;

use App\Models\Application;


class PaymentController extends Controller
{
    use PayOnline;

    public function index()
    {
        return view('payment.index');
    }
    
}
