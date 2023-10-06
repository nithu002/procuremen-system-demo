<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin;
use Carbon\Carbon;
use Mail;
use Hash;
use Illuminate\Support\Str;


class ForgetPasswordCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForgetPasswordForm()
    {
        //
        return view('auth.admin.password.forget_password');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submitForgetPasswordForm(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);
        $token =Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at'=>Carbon::now(),
        ]);

        Mail::send('emails.forget.adminpage', ['token' => $token], function($message) use($request){

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
        return view('auth.admin.password.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Display the specified resource.
     */
    public function submitResetPasswordForm(Request $request)
    {
        //
        $request->validate([
            'email' =>'required|email|exists:admins',
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

        $user =Admin::where('email',$request->email)->update([
            'password'=>Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email',$request->email)->delete();

        return redirect('/admin')->with('success','Your password has been changed!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
