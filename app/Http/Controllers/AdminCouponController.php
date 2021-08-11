<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminCouponController extends Controller
{
    private $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
        
    }

    public function index()
    {
        $coupons = $this->coupon->latest()->paginate(15);
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        foreach ($coupons as $key => $coupon) {
            if(strtotime($today) > strtotime($coupon->date_end) )
            {
                DB::table('coupons')
                ->where('id',$key)
                ->update([
                'coupon_status' => 0,
                ]);
            }
            if ($coupon->coupon_time == 0) {
                DB::table('coupons')
                ->where('id',$key)
                ->update([
                'coupon_status' => 0,
                ]);
            }
        }
        return view('admin.coupon.index',compact('coupons','today'));

    }
    
    public function create()
    {
        
        return view('admin.coupon.add');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->coupon->create([
                'coupon_name' => $request->coupon_name,
                'coupon_code' => $request->coupon_code,
                'coupon_condition' => $request->coupon_condition,
                'coupon_number' => $request->coupon_number,
                'coupon_time' => $request->coupon_time,
                'limit_bills' => $request->limit_bills,
                'date_start' => $request->date_start,
                'date_end' => $request->date_end,
                
            ]);
            
            DB::commit();
            return redirect()->route('coupons.index');
        } catch (\Exception $th) {
            DB::rollBack();
            Log::error("loi: " . $th->getMessage() . "dong " . $th->getLine());
        }

        

    }
    /*
    public function edit($id){
        $coupon = $this->coupon->find($id);
        return view('admin.role.edit',compact('coupon'));
    }
    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $this->coupon->find($id)->update([
                'coupon_name' => $request->coupon_name,
                'coupon_code' => $request->coupon_code,
                'coupon_condition' => $request->coupon_condition,
                'coupon_number' => $request->coupon_number,
                'coupon_time' => $request->coupon_time,
                
            ]);
           
            DB::commit();
            return redirect()->route('coupons.index');
        } catch (\Exception $th) {
            DB::rollBack();
            Log::error("loi: " . $th->getMessage() . "dong " . $th->getLine());
        }

    }
    */
    public function delete($id){
        
        $this->coupon->find($id)->delete();
        return redirect()->route('coupons.index');
    }
    
}