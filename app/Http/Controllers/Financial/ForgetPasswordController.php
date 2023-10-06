<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procurement;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use DB;
use App\Models\finacial;

class ForgetPasswordController extends Controller
{
    //
    public function showForgetPasswordForm()
    {
        //
        return view('auth.financial.password.forget_password');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submitForgetPasswordForm(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email|exists:financial',
        ]);
        $token =Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at'=>Carbon::now(),
        ]);

        Mail::send('emails.forget.financial', ['token' => $token], function($message) use($request){

            $message->to($request->email);

            $message->subject('Reset Password');


        });
        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function showResetPasswordForm($token)
    {
        //
        return view('auth.financial.password.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Display the specified resource.
     */
    public function submitResetPasswordForm(Request $request)
    {
        //
        $request->validate([
            'email' =>'required|email|exists:financial',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required',
        ]);
        $updatepassword=DB::table('password_reset_tokens')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        if(!$updatepassword){
            return back()->with('error', 'Invalid Token!');
        }

        $user =finacial::where('email',$request->email)->update([
            'password'=>$request->password,
        ]);

        DB::table('password_reset_tokens')->where('email',$request->email)->delete();

        return redirect('/financial')->with('success','Your password has been changed!');
    }
}
