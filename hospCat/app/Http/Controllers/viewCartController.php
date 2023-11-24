<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\Foods;

class viewCartController extends Controller
{
    public function viewCart(Request $request){
        // get the pid from url
        $pid = $request->session()->get('user');
        if($pid){
            //return the order details of the user with given PID
            $order_details = orders::where('PID',$pid)
                                ->where('DeliveryStatus', '=', 0)
                                ->join('Foods', 'orders.FID', '=', 'Foods.FID')
                                ->select('orders.*', 'foods.FName', 'foods.Price')
                                ->get();
            return view('cart',['order_details'=>$order_details]);
        }
        else{
            return redirect()->route('login')
        ->with('message', 'User not logged in!');
        }
    }
    public function placeOrder(Request $request)
    {
        // Get the PID from the request
        $pid = $request->session()->get('user');

        // Update the DeliveryStatus to 1 for all orders with the specified PID
        orders::where('PID', $pid)
            ->where('DeliveryStatus', '=', 0)
            ->update(['DeliveryStatus' => 1]);

        return redirect()->back();
    }

}