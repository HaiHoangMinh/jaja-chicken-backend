<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminCustomerController extends Controller
{
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->paginate(5);
        return view('admin.customer.index',compact('customers'));

    }
    public function delete($id){
        $this->customer->find($id)->delete();
    }
}