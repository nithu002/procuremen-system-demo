<?php

namespace App\Http\Controllers\super;

use App\Http\Controllers\Controller;
use App\Mail\POGentrandMail;
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
use App\Mail\RejectedQuotaitinMail;
use App\Models\PO_prodect;
use App\Models\POdetail;

class QAController extends Controller
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

        $cont=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','new')->count();

        $filterRequest=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','quotation')->get();
                               $conts = $filterRequest->count();
                               return view('super_visor.QA',compact('filterRequest','data','conts','cont'));

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


        return view('super_visor.QA-view',compact('data','cont','conts','details','tables','date','procument'));
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
    public function download3($id)
    {
        //
        $file=PRModel::find($id);
        $cn=$file->quotation1;
        $myFile = public_path("storage/quotations/$cn");
        return response()->download($myFile);
    }
    public function download4($id)
    {
        //
        $file=PRModel::find($id);
        $cn=$file->quotation2;
        $myFile = public_path("storage/quotations/$cn");
        return response()->download($myFile);
    }
    public function download5($id)
    {
        //
        $file=PRModel::find($id);
        $cn=$file->quotation3;
        $myFile = public_path("storage/quotations/$cn");
        return response()->download($myFile);
    }
    public function download6($id)
    {
        //
        $file=PRModel::find($id);
        $cn=$file->bidAnalysis;
        $myFile = public_path("storage/quotations/$cn");
        return response()->download($myFile);
    }

    public function download7($id)
    {
        //
        $file=PRModel::find($id);
        $cn=$file->seleded_quotation;
        $myFile = public_path("storage/quotations/selected/$cn");
        return response()->download($myFile);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function filder($id)
    {
        //



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


       if(!$request->file==""){

        $completeFileName = $request->file('file')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
        $path = $request->file('file')->move('storage/quotations/selected', $compPic);
        $fileName1 = $compPic;
        $update->seleded_quotation=$fileName1;
       }

// dd($request->id);
        $update->status_now=$request->status;
        $update->quotation_remarks=$request->remarks;

        $rejected=[
            'name'=>$update->procument_name,
            'pr'=>$update->reqno,
        ];

        // dd($update->procument_email);

        if($request->status=='Quo_Approved'){

                $lastorderId = POdetail::orderBy('id', 'desc')->first()->id;
                // Get last 3 digits of last order id
                $lastIncreament = substr($lastorderId, -3);
                // Make a new order id with appending last increment + 1
                $newPOID = 'PO'.date('Y') .'-'. date('m') .'-'. str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

                $details=[
                    'POID'=>$newPOID,
                    'id'=>$update->reqno,
                    'procurmer'=>$update->procument_name,
                ];

                $new=new POdetail();
                $new->poID=$newPOID;
                $new->prID=$update->reqno;
                $new->supervioserName=$update->supervisor_name;
                $new->supervioserEmail=$update->supervisor_email;
                $new->pocumerName=$update->procument_name;
                $new->pocumerEmail=$update->procument_email;
                $new->requestsID=$request->id;
                $new->poStatus=$request->status;
                $new->seleded_quotation=$update->seleded_quotation;
                $new->super_vioser_remarks=$update->quotation_remarks;
                $new->save();

                Mail::to($update->procument_email)->send(new POGentrandMail($details));
                $update->save();
                return redirect('viocer/quotation')->with('success','Mail has sending successfully in procurement officer');


         }else{
            Mail::to($update->procument_email)->send(new RejectedQuotaitinMail($rejected));
            $update->save();

            return redirect('viocer/quotation')->with('success','Data Update Successfully');

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
