<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Foods;

class viewCartController extends Controller
{
    public function viewCart(Request $request){
        // get the pid from url
        $pid = $request->input('pid');
        //return the order details of the user with given PID
        $order_details = Order::where('PID',$pid)
                                ->where('DeliveryStatus', '=', 0)
                                ->get();
        return $order_details;
        // return view('cart',['order_details'=>$order_details]);
    }
    public function orderStatusUpdate(Request $request){
        // get the pid from url
        $pid = $request->input('pid');
        //update the DeliveryStatus to 1 indicating order confirmation
        Order::where('pid', $pid)
               ->where('DeliveryStatus', '=', '0')
               ->update(['DeliveryStatus' => 1]);

        return response()->json(['message' => 'Order status updated']);

    }
}