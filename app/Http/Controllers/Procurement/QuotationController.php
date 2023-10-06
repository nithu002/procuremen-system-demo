<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Mail\QuotationMail;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\PO_prodect;
use App\Models\POdetail;
use App\Models\Procurement;
use App\Models\Prodect;
use Illuminate\Support\Carbon;
use App\Models\PRModel;
use Mail;


class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Procurement::where ('id','=',Session::get('loginId'))->first() ;
        }



        $filterRequest=PRModel::where('procument_name','=',$data->name)
        ->where('status_now','=','PR_Approved')->get();
                     $conts = $filterRequest->count();

        $cont=POdetail::where('pocumerName','=',$data->name)
                               ->where('poStatus','=','Quo_Approved')->count();





         return view('Procurement.add-quotation',compact('conts','cont','data','filterRequest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addDetails($id)
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
        $data= array();
        if(Session::has('loginId')){
         $data=Procurement::where ('id','=',Session::get('loginId'))->first() ;
        }
        $conts=PRModel::where('procument_name','=',$data->name)
        ->where('status_now','=','PR_Approved')->count();

        $cont=POdetail::where('pocumerName','=',$data->name)
        ->where('poStatus','=','Quo_Approved')->count();

        $details=PRModel::find($id);


        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        $date=Carbon::today();




        return view('Procurement.add-quotationView',compact('data','conts','cont','details','tables','date'));

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
    public function update(Request $request)
    {
        //
        $update=PRModel::find($request->id);

        $request->validate([
            'inlineRadioOptions'=>'required',
        ]);
        $details=[

           'name'=>$update->supervisor_name,
           'id'=>$update->reqno,
           'procumer'=>$update->procument_name,
        ];
        if($request->hasFile('quotation1')){
            $completeFileName = $request->file('quotation1')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('quotation1')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
            $path = $request->file('quotation1')->move('storage/quotations', $compPic);
            $fileName1 = $compPic;
            $update->quotation1=$fileName1;
           }
           if($request->hasFile('quotation2')){
            $completeFileName = $request->file('quotation2')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('quotation2')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
            $path = $request->file('quotation2')->move('storage/quotations', $compPic);
            $fileName2 = $compPic;
            $update->quotation2=$fileName2;
           }
           if($request->hasFile('quotation3')){
            $completeFileName = $request->file('quotation3')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('quotation3')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
            $path = $request->file('quotation3')->move('storage/quotations', $compPic);
            $fileName3 = $compPic;
            $update->quotation3=$fileName3;
           }
           if($request->hasFile('bidanalysis')){
            $completeFileName = $request->file('bidanalysis')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('bidanalysis')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
            $path = $request->file('bidanalysis')->move('storage/quotations', $compPic);
            $fileName4 = $compPic;
            $update->bidAnalysis=$fileName4;
           }

        $update->status_now='quotation';

        $update->single_sourceText=$request->single_sourceText;
        $update->single_source=$request->inlineRadioOptions;

        // dd($request->procument_email);


        Mail::to($update->supervisor_email)->send(new QuotationMail($details));

        $data=$update->save();

        if ($data) {
            return redirect('procurementPanel/quotation')->with('success', 'Your quotation details has sending successfully in supervisor');
        }else{
            return redirect('procurementPanel/quotation')->with('error', 'Somethings network  error please try again');
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