<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        return view('coupon.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'quantity'=>'required', 
            'percentage'=>'required', 
        ]);

        for($no =  $request->quantity; $no>0; $no--){
            Coupon::firstOrCreate([
                'code'=>(substr(md5(time().$no.'diswab>=2025'), 0, 8)),
                'percentage'=>$request->percentage
            ]);
        }

        return redirect()->route('coupon.index')->withToastSuccess('All Coupons Generated');
    }

    public function update(Request $request, $couponId)
    {
        $coupon = Coupon::find($couponId);

       $coupon->update([
           'code'=>$request->code,
           'percentage'=>$request->percentage,
           'status'=>$request->status,
        ]);

        return redirect()->route('coupon.index')->withToastSuccess('Coupon Updated');
    }

    public function delete($couponId)
    {
        $coupon = Coupon::find($couponId);

        if($coupon->application){
            $coupon->application->delete();
        }
       
        $coupon->delete();

        return redirect()->route('coupon.index')->withToastSuccess('Coupon Deleted');
    }

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
