<?php

namespace app\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function dashboard(){
        $orders=Order::orderBy('id','DESC')->get();
        return view('merchant.index',compact('orders'));
    }
}
