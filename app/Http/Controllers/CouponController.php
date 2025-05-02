<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function check(Request $request)
    {
        $coupon = Coupon::where(['code'=> $request->code,'status'=>'active'])->first();

        if ($coupon) {
            return response()->json([
                'success' => true,
                'percentage_off' => $coupon->percentage,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
