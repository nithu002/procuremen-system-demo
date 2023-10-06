<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Admin;
use Session;
use App\Models\Supervoicer;
use DB;
use Illuminate\Support\Carbon;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staff= Staff::latest()->get();
         $super= Supervoicer::latest()->get();
         $data= array();
         if(Session::has('loginId')){
            $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
          }
         return view('admin.staff_details',compact('data','staff','super'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function super($id)
    {
        // This dependent dropdown list
        echo json_encode(DB::table('supervoicers')->where('name', $id)->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:staffs',
            'phone_no'=>'required|numeric',
            'super_name'=>'required',
            'super_email'=>'required',
        ]);
        //staff

        $code=rand(1,1000);
        $referid  ='#Staff_' . $code;
        $details= new Staff();
        $details->name=$request->name;
        $details->email=$request->email;
        $details->phone_no=$request->phone_no;
        $details->supervisor_name=$request->super_name;
        $details->supervisor_email=$request->super_email;
        $details->user_roleID=$referid;
        //save
        $data= $details->save();

        if($data){
            return redirect('/staff')->with('success','New Column Created Successfuly');
        }else{
            return redirect('/staff')->with('warning','Somethings error please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function filter(Request $request)
    {
        //
        $dateFilter = $request->date_filter;
        $Super=$request->super_name;
        $staff= Staff::query();

        switch($dateFilter){
            case 'today':
                $staff->whereDate('created_at',Carbon::today());
                break;
            case 'yesterday':
                $staff->wheredate('created_at',Carbon::yesterday());
                break;
            case 'this_week':
                $staff->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $staff->whereBetween('created_at',[Carbon::now()->subWeek(),Carbon::now()]);
                break;
            case 'this_month':
                $staff->whereMonth('created_at',Carbon::now()->month);
                break;
            case 'last_month':
                $staff->whereMonth('created_at',Carbon::now()->subMonth()->month);
                break;
            case 'this_year':
                $staff->whereYear('created_at',Carbon::now()->year);
                break;
            case 'last_year':
                $staff->whereYear('created_at',Carbon::now()->subYear()->year);
                break;
        }
         switch($Super){
             case 'all':
                $staff;
                  break;
             case $Super:
                $staff->where('supervisor_name',$request->super_name);
                 break;

         }
        $staff = $staff->get();



         $super= Supervoicer::latest()->get();
         $data= array();
         if(Session::has('loginId')){
            $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
          }
         return view('admin.staff_details',compact('data','staff','super','dateFilter'));


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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'super_name'=>'required',
            'super_email'=>'required',
        ]);

        //vehicle
        $update_details=Staff::find($id);
        $update_details->name=$request->name;
        $update_details->email=$request->email;
        $update_details->phone_no=$request->phone_no;
        $update_details->supervisor_name=$request->super_name;
        $update_details->supervisor_email=$request->super_email;
        //save
        $data= $update_details->save();

        if($data){
            return redirect('/staff')->with('success','Staff Details Updated Successfully');
        }else{
            return redirect('/staff')->with('warning','Somethings error please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $deleteData=Staff::find($request-> id);
        $deleteData->delete();
        return redirect('/staff')->with('success','Staff Details Deleted Successfully');
    }
}
