<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programeleade;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use DB;

class ForgetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showForgetPasswordForm()
    {
        //
        return view('auth.program.password.forget_password');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submitForgetPasswordForm(Request $request)
    {
        //
        $request->validate([
            'email' => 'required|email|exists:programeleades',
        ]);
        $token =Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at'=>Carbon::now(),
        ]);

        Mail::send('emails.forget.leadpage', ['token' => $token], function($message) use($request){

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
        return view('auth.program.password.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Display the specified resource.
     */
    public function submitResetPasswordForm(Request $request)
    {
        //
        $request->validate([
            'email' =>'required|email|exists:programeleades',
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

        $user =Programeleade::where('email',$request->email)->update([
            'password'=>$request->password,
        ]);

        DB::table('password_reset_tokens')->where('email',$request->email)->delete();

        return redirect('/lead')->with('success','Your password has been changed!');
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