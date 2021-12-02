<?php

namespace App\Http\Controllers;
use DB; 
use Carbon\Carbon; 
use App\Models\Developer; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
      
      public function submitForgetPasswordMail(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:developers',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return  response()->json("Reset Password link sent to your mail successfully.");
      }


public function updatePassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:developers',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'
    ]);

    $updatePassword = DB::table('password_resets')
                        ->where([
                          'email' => $request->email, 
                          'token' => $request->token
                        ])
                        ->first();

    if(!$updatePassword){
        return  response()->json("Invalid token");
    }

    $user = Developer::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return  response()->json("Your mail updated successfully.");
}

}