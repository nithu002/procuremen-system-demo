<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use DB;
use Hash;
class LockScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
        }

           return view('auth.admin.lockscreen',compact('data'));


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
    public function show(Request $request)
    {
        //
        $request->validate([
            'password'=>'required|min:6',
        ]);
        $data= array();
        if(Session::has('loginId')){
         $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
        }

        if(Hash::check($request->password,$data->password)){

            return redirect('/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
        }else{
            return redirect('lockscreen')->with('error','Invalid Password');
        }



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
