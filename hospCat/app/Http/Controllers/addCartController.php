<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentPatient;
use App\Models\orders;

class addCartController extends Controller
{
    public function cartJsonRequest(Request $request)
    {
        //handling request for adding the food item to orders table
        $fid = $request->input('fid');
        // get the pid from session
        $pid=$request->session()->get('user')['id'];
        // get the ward number 
        $wardNo = CurrentPatient::where('PID', $pid)->value('WardNo');
        
        // Check if an order already exists for the specified patient and food
        $existingOrder = orders::where('PID', $pid)
            ->where('FID', $fid)
            ->where('DeliveryStatus', 0)
            ->first();
        
        if ($existingOrder) {
            // If an existing order is found, increment the quantity
            $existingOrder->update(['Quantity' => $existingOrder->Quantity + 1]);
        } else {
            // If no existing order is found, create a new order
            orders::create([
                'PID' => intval($pid),
                'FID' => intval($fid),
                'WardNo' => $wardNo,
                'DeliveryStatus' => 0,
                'Quantity' => 1,
            ]);
        }

        // Return a response
        return response()->json(['message' => 'Request handled successfully']);
    }
}