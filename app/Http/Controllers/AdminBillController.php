<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail as AppBillDetail;
use PDF;
use App\Customer;
use App\BillDetail;
use App\Payment;
use App\Product;
use App\Shipping;
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
        $bills = $this->bill->orderBy('id','DESC')->paginate(10);
        $customers = $this->customer->all();
        $shippings = Shipping::all();
        $payments = Payment::all();
        return view('admin.bill.index',compact('bills','customers','shippings','payments'));

    }
    public function detail($id)
    {
        $bills = $this->bill->all();
        $bill = $this->bill->find($id);
        $customers = $this->customer->all();
        $shippings = DB::table('shippings')->get();
        $billDetails = $this->bill_detail->where('bill_id',$id)->get();
        $products = $this->product->all();
        return view('admin.bill.detail',compact('billDetails','products','bills','bill','customers','shippings'));
    }
    public function update($id){
        $bill = $this->bill->find($id);
        if ($bill->status == 1) {
            DB::table('bills')
                ->where('id', $id)
                ->update(['status' => 2]);
        } else {
            DB::table('bills')
                ->where('id', $id)
                ->update(['status' => 3]);
        }
        return redirect()->route('bills.index');
    }
    public function delete($id){
        try {
            $this->bill->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ]);
            
        } catch (\Exception $th) {
            Log::error('Message'.$th->getMessage().'Line: ' . $th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed',
            ]);
        }
    }
    
    public function cancel($id)
    {
        DB::table('bills')
                ->where('id', $id)
                ->update(['status' => 0]);
    return redirect()->route('bills.index');
    }
}