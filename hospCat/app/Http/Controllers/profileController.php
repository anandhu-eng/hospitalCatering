<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDetail;
use App\Models\CurrentPatient;

class profileController extends Controller
{
    public function viewProfile(Request $request){
        // get the pid from url
        $pid = $request->input('pid');
        $patientDetails = PatientDetail::where('PID', $pid)->first();
        $wardNo = currentPatient::where('PID', $pid)->first();
        return view('patientProfile', ['patientDetails' => $patientDetails, 'wardDetails' => $wardNo]);
    }
}
