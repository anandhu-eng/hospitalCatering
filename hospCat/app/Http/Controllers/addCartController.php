<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addCartController extends Controller
{
    public function cartJsonRequest(Request $request)
    {
        // Handle JSON request data
        $data = $request->json()->all();

        // Process the data as needed
        $pid = $data['PID'];
        $foodid = $data['FID'];
        // For example, you can access specific fields using $data['key']

        // Return a response
        return response()->json(['message' => 'Request handled successfully']);
    }
}
