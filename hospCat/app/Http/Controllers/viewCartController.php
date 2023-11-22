<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewCartController extends Controller
{
    public function viewCart(Request $request){
        // get the pid from url
        $pid = $request->input('pid');
        return $pid;
    }
}
