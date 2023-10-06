<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Admin;
use App\Models\MailConfig;

class MailConfigcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mail = MailConfig::first();
        $data= array();
        if(Session::has('loginId')){
         $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
        }
     return view('admin.settings.mail',compact('data','mail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $request->validate([
            'mail_transport'=>'required',
            'mail_host'=>'required',
            'mail_port'=>'required',
            'mail_username'=>'required',
            'mail_password'=>'required',
            'mail_encryption'=>'required',
            'mail_from'=>'required',

        ]);

        $update = MailConfig::find($id);
        $update->mail_transport = $request->mail_transport;
        $update->mail_host = $request->mail_host;
        $update->mail_port = $request->mail_port;
        $update->mail_username = $request->mail_username;
        $update->mail_password = $request->mail_password;
        $update->mail_encryption = $request->mail_encryption;
        $update->mail_from = $request->mail_from;

        $data=$update->save();
        if($data){
            return redirect('/email')->with('success','Mail Details Updated Successfully');
        }else{
            return redirect('/email')->with('warning','Somethings error please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}