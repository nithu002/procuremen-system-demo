<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use App\Mail\POSentMail;
use App\Mail\POSentMailLead;
use App\Mail\QuotationMail;
use App\Mail\RejectedPOMail;
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
use App\Models\Programeleade;

class POController extends Controller
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


        $filterRequest=POdetail::where('pocumerName','=',$data->name)
        ->where('poStatus','=','Quo_Approved')->get();
                     $cont = $filterRequest->count();

        $conts=PRModel::where('procument_name','=',$data->name)
                               ->where('status_now','=','PR_Approved')->count();





         return view('Procurement.createPO',compact('conts','cont','data','filterRequest'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function details($id)
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Procurement::where ('id','=',Session::get('loginId'))->first() ;
        }

        $find=PRModel::find($id);

        // dd($find->status_now);
        $cont=POdetail::where('pocumerName','=',$data->name)
        ->where('poStatus','=','Quo_Approved')->get()->count();

        $conts=PRModel::where('procument_name','=',$data->name)
                               ->where('status_now','=','PR_Approved')->count();

        if($find->status_now=='PO_Rejected'){

            $details=POdetail::where('requestsID',$find->id)->first();

            // dd($details->poID);
            $date=Carbon::today();
            $lead=Programeleade::find(1);
            // dd($lead);
            return view('Procurement.rejectPo',compact('data','details','conts','cont','date','find','lead'));
        }
        elseif($find->status_now=='Quo_Rejected'){



            $tables=Prodect::where('reqno',$find->reqno)->get();
            $date=Carbon::today();
            return view('Procurement.rejected-quotation',compact('find','tables','conts','cont','data'));


        }



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

            $details=POdetail::find($id);


            $requestID=$details->prID;
            $request=PRModel::where('reqno','=',$requestID)->first();
            $staff=$request->req_name;
            // dd($staff);




        $date=Carbon::today();




        return view('Procurement.createpoView',compact('data','conts','staff','cont','details','date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateall(Request $request)
    {
        //
        $status='final';
        $date=Carbon::today();
        $lead=Programeleade::find(1);
        $all=POdetail::find($request->id);
        $all->poDueDate=$request->poDueDate;
        $all->deliveryDate=$request->deliveryDate;
        $all->supplierName=$request->supplierName;
        $all->supplierContact_no=$request->supplierContact_no;
        $all->supplierAddress=$request->supplierAddress;
        $all->supplierEmail=$request->supplierEmail;
        $all->totalPO=$request->FTotal;
        $all->date=$date->format('d-m-Y');
        $all->poStatus=$status;

        $details = [
            'reqNO' => $all->prID,
            'PONo'=>$all->poID,
            'lead'=>$lead->name,
            ];

        $prID=$all->requestsID;
        $updatetable=PRModel::find($prID);
        $updatetable->status_now=$status;
        $updatetable->save();
        $all->save();

        $poID=$all->poID;
        $no=1;
        DB::table("p_o_prodects")->whereIn('poID',explode(",",$poID))->delete();

        foreach($request->description as $key => $description){

            $data['no']         = $no;
            $data['poID']      = $poID;
            $data['description']= $request->description[$key];
            $data['specification']=$request->specification[$key];
            $data['qty']        = $request->qty[$key];
            $data['rate']       = $request->rate[$key];
            $data['amt']        = $request->amt[$key];

            PO_prodect::insert($data);

       }
       if($all->save()){
        // dd($lead->email);

        Mail::to($lead->email)->send(new POSentMailLead($details));

        return redirect('procurementPanel/create')->with('success','Your created PO has sent successfully in operation lead');
       }
       else{
        return redirect('procurementPanel/create')->with('error','Something went wrong, please try again');
       }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $status='final';
        $date=Carbon::today();
        $lead=Programeleade::find(1);
        $all=POdetail::find($request->id);
        $all->poDueDate=$request->poDueDate;
        $all->deliveryDate=$request->deliveryDate;
        $all->supplierName=$request->supplierName;
        $all->supplierContact_no=$request->supplierContact_no;
        $all->supplierAddress=$request->supplierAddress;
        $all->supplierEmail=$request->supplierEmail;
        $all->totalPO=$request->FTotal;
        $all->date=$date->format('d-m-Y');
        $all->poStatus=$status;

        $details = [
            'reqNO' => $all->prID,
            'PONo'=>$all->poID,
            'lead'=>$lead->name,
            ];



        $all->save();


        $getRequestID = DB::table('p_odetails')->orderBy('id','DESC')->select('poID')->first();
        $poID=$getRequestID->poID;
        $no=1;


        foreach($request->description as $key => $description){

            $data['no']         = $no;
            $data['poID']      = $poID;
            $data['description']= $request->description[$key];
            $data['specification']=$request->specification[$key];
            $data['qty']        = $request->qty[$key];
            $data['rate']       = $request->rate[$key];
            $data['amt']        = $request->amt[$key];

            PO_prodect::insert($data);

       }
       if($all->save()){
        // dd($lead->email);


        Mail::to($lead->email)->send(new POSentMailLead($details));

        return redirect('procurementPanel/create')->with('success','Your created PO has sent successfully in operation lead');
       }
       else{
        return redirect('procurementPanel/create')->with('error','Something went wrong, please try again');
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