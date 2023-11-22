<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class orderController extends Controller
{
    public function viewOrders(Request $request){
        // get the pid from session
        $pid=$request->session()->get('user');
        // get  the order details from the orders table
        $allOrders=Order::where('PID', $pid)->get();
        return view('order', ['allOrders' => $allOrders]);
    }
}
