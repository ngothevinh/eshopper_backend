<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
    private $customer;
    private $bill;
    public function __construct(Customer $customer,Bills $bill){
        $this->customer=$customer;
        $this->bill=$bill;
    }

    public function listCart(){
        $carts=$this->customer->latest()->paginate(5);
        return view('admin.cart.index',compact('carts'));
    }
    public function detailList($id){
            $carts=$this->customer->where('id',$id)->get();
            $bills=$this->bill->where('customer_id',$id)->get();
            return view('admin.cart.detailList',compact('carts','bills'));
    }

}
