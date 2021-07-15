<?php

namespace App\Http\Controllers;

use App\City;
use App\FeeShip;
use App\Province;
use App\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminDeliveryController extends Controller
{
    private $city;
    private $province;
    private $wards;

    public function __construct(City $city, Province $province, Wards $wards)
    {
        $this->city = $city;
        $this->province = $province;
        $this->wards = $wards;
    }
    public function index()
    {
        $fee_ship = FeeShip::all();
        $city = $this->city->all();
        $province = $this->province->all();
        $wards = $this->wards->all();
        return view('admin.delivery.index',compact('fee_ship','city','province','wards'));
    }
    public function create()
    {
        $data1= $this->city->where('matp',1)->first();
        $data2 = $this->city->where('matp',24)->first();
        $city =array();
        $city[0] = $data1;
        $city[1] = $data2;
       
        return view('admin.delivery.add',compact('city'));

    }
    
    
    public function select(Request $request)
    {
            $data = $request->all();
            if ($data['action']) {
                $output = '';
                if ($data['action'] == 'city') {
                    $select_province = Province::where('matp',$data['ma_id'])->get();
                    $output .='<option value="">'."Chọn quận huyện".'</option>';
                    foreach ($select_province as $key => $province) {
                        $output .='<option value="'.$province->maqh.'">'.$province->name.'</option>';
                    }
                    
                }else{
                    $select_wards = Wards::where('maqh',$data['ma_id'])->get();
                    $output .='<option value="">'."Chọn xã phường".'</option>';
                    foreach ($select_wards as $key => $wards) {
                        $output .='<option value="'.$wards->xaid.'">'.$wards->name.'</option>';
                    }
                }
                echo $output;
            }
           
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $fee_ship = new FeeShip();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }
}