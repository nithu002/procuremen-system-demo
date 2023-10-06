<?php

namespace App\Http\Controllers\super;

use App\Http\Controllers\Controller;
use App\Mail\RejectMail;
use Illuminate\Http\Request;
use App\Models\PRModel;
use App\Models\Supervoicer;
use Session;
use App\Models\Prodect;
use Illuminate\Support\Carbon;
use App\Models\Procurement;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProcumerRequestMail;

class PRApprovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }
        $conts=PRModel::where('supervisor_name','=',$data->name)
        ->where('status_now','=','quotation')->count();
        $filterRequest=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','new')->latest()->get();
                               $cont = $filterRequest->count();
                               return view('super_visor.requestdetails',compact('filterRequest','data','cont','conts'));




    }

    /**
     * Show the form for creating a new resource.
     */
    public function viewDetails($id)
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }
        $cont=PRModel::where('supervisor_name','=',$data->name)
        ->where('status_now','=','new')->count();
        $conts=PRModel::where('supervisor_name','=',$data->name)
        ->where('status_now','=','quotation')->count();

        $details=PRModel::find($id);


        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        $date=Carbon::today();


        $procument= Procurement::latest()->get();


        return view('super_visor.view-form',compact('data','conts','cont','details','tables','date','procument'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function downloadTOR($id)
    {
        //
        $file=PRModel::find($id);
        $tor=$file->file_tor;
        $myFile = public_path("storage/files/$tor");
        return response()->download($myFile);

    }

    /**
     * Display the specified resource.
     */
    public function downloadCN($id)
    {
        //
        $file=PRModel::find($id);
        $cn=$file->file_cn;
        $myFile = public_path("storage/files/$cn");
        return response()->download($myFile);



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function filder($id)
    {
        //
        echo json_encode(DB::table('procurements')->where('name', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([

            'status'=>'required',

        ]);
        $update=PRModel::find($request->id);
        $details=[
            'staffname'=>$update->req_name,
           'name'=>$request->procument_name,
           'id'=>$update->reqno,
        ];
        $update->status_now=$request->status;
        $update->procument_name=$request->procument_name;
        $update->procument_email=$request->procument_email;
        $update->super_vioser_remarks=$request->remarks;

        // dd($request->procument_email);

         if($request->status=='PR_Approved'){
            Mail::to($request->procument_email)->send(new ProcumerRequestMail($details));
         }else{

            Mail::to($request->user_email)->send(new RejectMail($details));
         }

        $data=$update->save();
        if ($data) {
            return redirect('viocer/request')->with('success', 'Update the details and the mail has been successfully sent to the  Procurement Officer');
        }else{
            return redirect('viocer/request')->with('error', 'Somethings error please try again');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function report(Request $request)
    {
        //
        $update=PRModel::find($request->id);
        $details=[
            'staffname'=>$update->req_name,
           'name'=>$request->procument_name,
           'id'=>$update->reqno,
        ];
        $update->status_now=$request->status;
        $update->procument_name=$request->procument_name;
        $update->procument_email=$request->procument_email;
        $update->super_vioser_remarks=$request->remarks;

        // dd($request->procument_email);

         if($request->status=='PR_Approved'){
            Mail::to($request->procument_email)->send(new ProcumerRequestMail($details));
         }else{

            Mail::to($request->user_email)->send(new RejectMail($details));
         }

        $data=$update->save();
        if ($data) {
            return redirect('viocer/all')->with('success', 'Updated the details and sent the mail to the procurer successfully');
        }else{
            return redirect('viocer/all')->with('error', 'Somethings error please try again');
        }
    }
}
