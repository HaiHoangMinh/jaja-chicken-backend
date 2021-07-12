<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail as AppBillDetail;
use App\Customer;
use App\BillDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminBillController extends Controller
{
    private $customer;
    private $bill;
    private $bill_detail;
    private $product;
    public function __construct(Bill $bill,Customer $customer,BillDetail $bill_detail,Product $product)
    {
        $this->customer = $customer;
        $this->bill = $bill;
        $this->bill_detail = $bill_detail;
        $this->product = $product;
    }

    public function index()
    {
        $bills = $this->bill->paginate(5);
        
        $customers = $this->customer->all();
        $shippings = DB::table('shippings')->get();
        $payments = DB::table('payments')->get();
        
        return view('admin.bill.index',compact('bills','customers','shippings','payments'));

    }
    public function create()
    {
       dd("bill created");

    }
    public function detail($id)
    {
        $bills = $this->bill->all();
        $billDetails = $this->bill_detail->where('bill_id',$id)->get();
        $products = $this->product->all();
        return view('admin.bill.detail',compact('billDetails','products','bills'));
    }
    public function delete($id){
        try {
            $this->bill->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], status:200);
            
        } catch (\Exception $th) {
            Log::error('Message'.$th->getMessage().'Line: ' . $th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed',
            ], status:500);
        }
    }
}