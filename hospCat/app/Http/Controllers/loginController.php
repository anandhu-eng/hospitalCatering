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
                // $food_records = Foods::all();
                // if ($food_records && $patient_details){
                //     return response()->json($food_records);
                //     return to_route('home', compact('food_records', 'patient_details'));
                // }

                // return $food_records;
                // return $patient_details;
                // return to_route('home', ['patient_details' => $patient_details,'food_records' => $food_records]);
                // return to_route('home', compact('patient_details', 'food_records'));

                // return view('home', ['patient_details' => $patient_details,
                // 'food_records' => $food_records]);
                return to_route('home');

            }
        }
        else{
        return redirect()->route('login')
        ->with('message', 'User with the mobine number is not currently admitted to hospital!');
        }
    }
    //for the home page
    public function home(Request $request){
        $pid=$request->session()->get('user');
        if($pid){
            $food_records = Foods::all();
            return view('home', ['food_records' => $food_records]);
        }
        else{
            return redirect()->route('login')
        ->with('message', 'User not logged in!');
        }
    }
    public function logOut(Request $request)
    {
        // Clear user session upon logout
        $request->session()->forget('user');
        // For a route with the following URI: profile/{id}
        return redirect()->route('login')
        ->with('message', 'User logged out!');
    }
}