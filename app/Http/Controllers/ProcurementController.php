<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Procurement;
use Session;
use Mail;
use Illuminate\Support\Str;
use App\Mail\ProcuremntAccessMail;


class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $procurement= Procurement::latest()->get();
        $data= array();
        if(Session::has('loginId')){
           $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
         }
        return view('admin.procurement',compact('data','procurement'));

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
            'procurement_name'=>'required',
            'email'=>'required|unique:procurements',
            'phone_no'=>'required|numeric',
            'address'=>'required',

        ]);
        //staff

        $code=rand(1,1000);
        $referid  ='#Procurement' . $code;

        $encrptpassword= Str::password(8 ,true, true, false, false);

        $details= new Procurement();
        $details->name=$request->procurement_name;
        $details->email=$request->email;
        $details->password=$encrptpassword;
        $details->phone_no=$request->phone_no;
        $details->address=$request->address;
        $details->user_roleID=$referid;
        //save
        $data= $details->save();


        if($data){
            return redirect('/procurement')->with('success','New Column Created Successfuly');
        }else{
            return redirect('/procurement')->with('warning','Somethings error please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function sentmail($id)
    {
        //
        $data= Procurement::find($id);
        $details = [
         'name' => $data->name,
         'email'=>$data->email,
         'password'=>$data->password,
         ];
        Mail::to($data->email)->send(new ProcuremntAccessMail($details));

        return redirect('/procurement')->with('success','Mail Has Senting Successfully');

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
            'procurement_name'=>'required',
            'email'=>'required',
            'phone_no'=>'required|numeric',
            'address'=>'required',

        ]);

        //vehicle
        $update_details=Procurement::find($id);
        $update_details->name=$request->procurement_name;
        $update_details->email=$request->email;
        $update_details->phone_no=$request->phone_no;
        $update_details->address=$request->address;
        //save
        $data= $update_details->save();

        if($data){
            return redirect('/procurement')->with('success',' Details Updated Successfully');
        }else{
            return redirect('/procurement')->with('warning',' Somethings error please try again');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $deleteData=Procurement::find($request->id);
        $deleteData->delete();
        return redirect('/procurement')->with('success',' Details Deleted Successfully');
    }
}