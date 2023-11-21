<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function checkNo(Request $request){
        // Get the phone number from the request
        $phoneNumber = $request->input('phone');
        // verofy whether the user is admitted or not

        //send otp to the user if approved
        
        return $phoneNumber;
    }
}
