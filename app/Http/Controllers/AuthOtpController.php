<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;

class AuthOtpController extends Controller
{


    public function send_verifiy_phone(){

        if(auth()->user()->mobile_verified_at != null){
            return redirect()->route('dashboard-overview-1');
        }

        # Generate An OTP
        $verificationCode = $this->generateOtp(auth()->user()->mobile_no);

        $message = "Your OTP To verify is - ".$verificationCode->otp;
        # Return With OTP


        return view('auth.verify', ['user_id' => $verificationCode->user_id,'message'=>$message]);

    }

    public function verifiyPhone(Request $request){

          #Validation
          $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = Carbon::now();
        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
            return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId($request->user_id)->first();

        if($user){
            // Expire The OTP
            $verificationCode->update([
                'expire_at' => Carbon::now()
            ]);

            auth::user()->update([
                'mobile_verified_at' => Carbon::now()
            ]);

            return redirect()->route('dashboard-overview-1');
        }

        return redirect()->route('login')->with('error', 'Your Otp is not correct');


    }


     // Generate OTP
     public function generate(Request $request)
     {

         # Validate Data
         $request->validate([
             'mobile_no' => 'required|exists:users,mobile_no'
         ]);


         # Generate An OTP
         $verificationCode = $this->generateOtp($request->mobile_no);

         $message = "Your OTP To Login is - ".$verificationCode->otp;
         # Return With OTP


         $user_id=$verificationCode->user_id;
         return view('auth.otp-verification',compact('user_id','message'));

     }


     public function generateOtp($mobile_no)
     {
         $user = User::where('mobile_no', $mobile_no)->first();

         # User Does not Have Any Existing OTP
         $verificationCode = VerificationCode::where('user_id', $user->id)->latest()->first();

         $now = Carbon::now();

         if($verificationCode && $now->isBefore($verificationCode->expire_at)){
             return $verificationCode;
         }

         // Create a New OTP
         return VerificationCode::create([
             'user_id' => $user->id,
             'otp' => rand(123456, 999999),
             'expire_at' => Carbon::now()->addMinutes(10)
         ]);
     }

 /*     public function verification($user_id)
    {
        return view('auth.otp-verification')->with([
            'user_id' => $user_id
        ]);
    } */

    public function loginWithOtp(Request $request)
    {
        #Validation
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = Carbon::now();
        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
            return redirect()->route('login')->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId($request->user_id)->first();

        if($user){
            // Expire The OTP
            $verificationCode->update([
                'expire_at' => Carbon::now()
            ]);

            $user->update([
                'mobile_verified_at' => Carbon::now()
            ]);

            Auth::login($user);

            return redirect()->route('dashboard-overview-1');
        }

        return redirect()->route('login')->with('error', 'Your Otp is not correct');
    }

}
