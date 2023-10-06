<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\ProgrameleadeMail;
use Mail;
use App\Models\Programeleade;
use Session;
use App\Models\finacial;
use Illuminate\Support\Str;
use App\Mail\FinancialMailAccess;

class ProgrameLeadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programme= Programeleade::latest()->get();
        $finacial=finacial::get();
        $data= array();
        if(Session::has('loginId')){
           $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
         }
        return view('admin.programeLead',compact('data','programme','finacial'));
    }

    public function financialaddINDEX()
    {
        //

        $finacial=finacial::get();
        $data= array();
        if(Session::has('loginId')){
           $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
         }
        return view('admin.financial',compact('data','finacial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function financialadd(Request $request, string $id)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',


        ]);

        //vehicle


        $update=finacial::find($id);
        $update->name=$request->name;
        $update->email=$request->email;
        $update->phone=$request->phone;
        //save
        $data= $update->save();

        if($data){
            return redirect('/financialadd')->with('success',' Details Updated Successfully');
        }else{
            return redirect('/financialadd')->with('warning',' Somethings error please try again');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'program_name'=>'required',
            'email'=>'required|unique:programeleades',
            'phone_no'=>'required|numeric',
            'address'=>'required',

        ]);
        //staff

        $code=rand(1,1000);
        $referid  ='#programeLead' . $code;

        $encrptpassword= Str::password(8 ,true, true, false, false);

        $details= new Programeleade();
        $details->name=$request->program_name;
        $details->email=$request->email;
        $details->password=$encrptpassword;
        $details->phone_no=$request->phone_no;
        $details->address=$request->address;
        $details->user_roleID=$referid;
        //save
        $data= $details->save();


        if($data){
            return redirect('/programme')->with('success','New Column Created Successfuly');
        }else{
            return redirect('/programme')->with('warning','Somethings error please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function sentmail($id)
    {
        //
      $data= Programeleade::find($id);
        $details = [
         'name' => $data->name,
         'email'=>$data->email,
         'password'=>$data->password,
         ];
        Mail::to($data->email)->send(new ProgrameleadeMail($details));

        return redirect('/programme')->with('success','Access has been sent to the mail');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function financialmail(string $id)
    {
        //
        $data= finacial::find($id);
        $details = [
         'name' => $data->name,
         'email'=>$data->email,
         'password'=>$data->password,
         ];
        Mail::to($data->email)->send(new FinancialMailAccess($details));

        return redirect('/financialadd')->with('success','Access has been sent to the mail');
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'program_name'=>'required',
            'email'=>'required',
            'phone_no'=>'required|numeric',
            'address'=>'required',

        ]);

        //vehicle
        $update_details=Programeleade::find($id);
        $update_details->name=$request->program_name;
        $update_details->email=$request->email;
        $update_details->phone_no=$request->phone_no;
        $update_details->address=$request->address;
        //save
        $data= $update_details->save();

        if($data){
            return redirect('/programme')->with('success',' Details Updated Successfully');
        }else{
            return redirect('/programme')->with('warning',' Somethings error please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $deleteData=Programeleade::find($request->id);
        $deleteData->delete();
        return redirect('/programme')->with('success',' Details Deleted Successfully');
    }
}