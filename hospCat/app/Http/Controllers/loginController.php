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
                // store user credentials in the session
                $request->session()->put('user', ['id'=>$currentPatient->PID]);
                $patient_details = $currentPatient->PID;
                $food_records = Foods::all();

                // return $food_records;
                // return $patient_details;
                // return redirect()->route('home')
                // ->with('patient_details', $patient_details)
                // ->with('food_records', $food_records);


                return view('home', ['patient_details' => $patient_details,
                'food_records' => $food_records]);

            }
        }
        else{
        return redirect()->route('login')
        ->with('message', 'User with the mobine number is not currently admitted to hospital!');
        }
    }
    public function logOut(Request $request)
    {
        // Clear user session upon logout
        $request->session()->forget('user');
    }
}