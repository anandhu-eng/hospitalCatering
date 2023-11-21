<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDetail;
use App\Models\CurrentPatient;
use App\Models\Foods;

class loginController extends Controller
{
    public function checkNo(Request $request){
        // Get the phone number from the request
        $phoneNumber = $request->input('phone');
        // verify whether the user is admitted or not
        $patient = PatientDetail::where('PhNo', $phoneNumber)->first();
        if($patient){
            $currentPatient = CurrentPatient::where('PID',$patient->PID)->first();
            if ($currentPatient){
                //contents  to be displayed in home page
                // patient details(PID only), food items

                $patient_details = $currentPatient->PID;
                $food_records = Foods::all();

                // return $food_records;    
                // return $patient_details;
                return view('home', ['patient_details' => $patient_details,
                'food_records' => $food_records]);

            }
        }
        //send otp to the user if approved
        return $phoneNumber;
        
    }
}

