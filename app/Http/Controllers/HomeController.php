<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

session_start();

class HomeController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = FacadesSession::get('admin_id');
        if($admin_id != null)
        {
            Redirect::to('/');
        } else {
            Redirect::to('/admin')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $count_bills = 0;
        $count = 0;
        $count_product = 0;
        $count_customer = 0;
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $date_start = $now->subWeek(); 
        $date_end = Carbon::now('Asia/Ho_Chi_Minh');
        $bills = DB::table('bills')->get();
        foreach ($bills as $key => $bill) {
            if (strtotime($date_end) > strtotime($bill->date_order) &&  strtotime($bill->date_order) > strtotime($date_start)) {
                $count_bills += 1;
            }
            if ($bill->status == 3) {
                $count += 1 ;
            }
        }
        if ($bills->count() != 0) {
            $result = number_format(($count/$bills->count())*100, 2, ',', '.');
        } else {
            $result = 0;
        }
        $customers = DB::table('customers')->get();
        foreach ($customers as $key => $customer) {
            if (strtotime($customer->created_at) < $date_end && strtotime($customer->created_at) > $date_start ) {
                $count_customer += 1;
            }
            if ($bill->status == 3) {
                $count += 1 ;
            }
        }
        $products = DB::table('products')->get();
        foreach ($products as $key => $product) {
            $count_product += $product->view_count;
        }
        // Luu doanh so
        $total_bills = 0;
        $sales = 0;
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        foreach ($bills as $key => $bill) {
            if (Carbon::parse($bill->date_order)->format('Y-m-d') == $date ) {
                if ($bill->status == 3) {
                    $total_bills += 1;
                    $sales += $bill->total;
                }
            }
        }
        if($total_bills != 0)
        {
            $statistical = DB::table('statistical')->where('date',$date)->first();
        if ($statistical == null) {
            DB::table('statistical')->insert([
                'date' => $date,
                'total_sales' => $sales,
                'total_bills' => $total_bills,
            ]);
        } else {
            DB::table('statistical')->where('date',$date)->update([
                'date' => $date,
                'total_sales' => $sales,
                'total_bills' => $total_bills,
            ]);
        }
        }
        
        return view("home",compact('count_bills','result','count_customer','count_product'));
    }
    public function filter_data(Request $request)
    {
       
        $date_start = Carbon::parse($request->date_start); 
        $date_end = Carbon::parse($request->date_end)->addHours(24); ;
        $statistical = DB::table('statistical')->get();
        $output = "";
        foreach ($statistical as $key => $item) {
            if (Carbon::parse($item->date) < $date_end && Carbon::parse($item->date) > $date_start ) {
                $output .= '
                <tr>
                <th scope="row">'.$item->id.'</th>
                <td> '.$item->date.' </td>
                <th>'.number_format($item->total_sales,0,',','.').' VNĐ</th>
                <td>'.$item->total_bills.'</td>
                 
                </tr>
            
                </td>
                </tr>
                ';
                
            }
        }
        echo $output ;
        
    }
            
}