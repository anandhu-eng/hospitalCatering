<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentPatient;
use App\Models\Order;

class addCartController extends Controller
{
    public function cartJsonRequest(Request $request)
    {
        // Handle JSON request data
        // $data = $request->json()->all();

        // // Process the data as needed
        // $pid = $data['PID'];
        // $foodid = $data['FID'];
        // For example, you can access specific fields using $data['key']

        //handling request for adding the food item to orders table
        $pid = $request->input('pid');
        $fid = $request->input('fid');

        $wardNo = CurrentPatient::where('PID', $pid)->value('WardNo');
        //adding the food item to order table
        Order::create([
            'PID'=>$pid,
            'FID'=>$fid,
            'WardNo'=>$wardNo,
            'DeliveryStatus'=>0
        ]);

        // Return a response
        return response()->json(['message' => 'Request handled successfully']);
    }
}