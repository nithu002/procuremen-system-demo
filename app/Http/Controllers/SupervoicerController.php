<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Supervoicer;
use Illuminate\Support\Carbon;
use DB;
use Session;
use Hash;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Mail\Mailable;
use App\Mail\SupervisorMail;


class SupervoicerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $super= Supervoicer::latest()->get();
        $data= array();
        if(Session::has('loginId')){
           $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
         }
        return view('admin.super_voicer',compact('data','super'));

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
        $request->validate([
            'super_name'=>'required',
            'email'=>'required|unique:supervoicers',
            'phone_no'=>'required|numeric',
            'address'=>'required',

        ]);
        //staff

        $code=rand(1,1000);
        $referid  ='#Supervisor_' . $code;

        $encrptpassword= Str::password(8,true, true, false, false);

        $details= new Supervoicer();
        $details->name=$request->super_name;
        $details->email=$request->email;
        $details->password=$encrptpassword;
        $details->phone_no=$request->phone_no;
        $details->address=$request->address;
        $details->user_roleID=$referid;
        //save
        $data= $details->save();


        if($data){
            return redirect('/visor')->with('success',' New Column Created Successfuly');
        }else{
            return redirect('/visor')->with('warning',' Somethings error please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function sentmail($id)
    {
       $data= Supervoicer::find($id);
       $details = [
        'name' => $data->name,
        'email'=>$data->email,
        'password'=>$data->password,
        ];
       Mail::to($data->email)->send(new SupervisorMail($details));

       return redirect('/visor')->with('success',' Mail Has Senting Successfully');

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
            'super_name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'address'=>'required',

        ]);

        //vehicle
        $update_details=Supervoicer::find($id);
        $update_details->name=$request->super_name;
        $update_details->email=$request->email;
        $update_details->phone_no=$request->phone_no;
        $update_details->address=$request->address;
        //save
        $data= $update_details->save();

        if($data){
            return redirect('/visor')->with('success',' Details Updated Successfully');
        }else{
            return redirect('/visor')->with('warning',' Somethings error please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $deleteData=Supervoicer::find($request-> id);
        $deleteData->delete();
        return redirect('/visor')->with('success',' Details Deleted Successfully');
    }
}
