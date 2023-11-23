<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\Foods;

class orderController extends Controller
{
    public function viewOrders(Request $request){
        // get the pid from session
        $pid=$request->session()->get('user');
        // get  the order details from the orders table
        $allOrders=orders::where('PID', $pid)
        ->join('Foods', 'orders.FID', '=', 'Foods.FID')
        ->select('orders.*', 'Foods.*')
        ->get();
        // return response()->json($allOrders);
        return view('order', ['allOrders' => $allOrders]);
    }
}
