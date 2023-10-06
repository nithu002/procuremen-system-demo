<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Mail\FinancialPOMail;
use App\Mail\RejectedPOMail;
use App\Models\finacial;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\PO_prodect;
use App\Models\POdetail;
use App\Models\Programeleade;
use Illuminate\Support\Carbon;
use App\Models\PRModel;
use Illuminate\Support\Facades\Mail;

class POFinal extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data=array();
        if(Session::has('loginId')){
            $data=Programeleade::where('id','=',Session::get('loginId'))->first();
        }
        $filterRequest=POdetail::whereNot('poStatus','=','Quo_Approved')
                            ->whereNot('poStatus','=','Sample')
                            ->whereNot('poStatus','=','finacial')
                            ->get();
                              $alert=POdetail::where('poStatus','final')->count();

                return view('program.PO-final',compact('filterRequest','data','alert'));

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
        $data= array();
        if(Session::has('loginId')){
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }
           $alert=POdetail::where('poStatus','final')->count();

        $details=POdetail::find($id);


        $tables=PO_prodect::where('poID','=',$details->poID)->get();
        $date=Carbon::today();




        return view('program.PO-View',compact('data','details','tables','alert','date'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function file(string $id)
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }
        echo json_encode(DB::table('programeleades')->where('name', $data->name)->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'status'=>'required'
        ]);
        $update=POdetail::find($request->id);
        $reqID= $update->prID;
        $financial=finacial::get()->first();
      // dd( $financial);

        $details=[
            'name'=>$financial->name,
            'email'=>$financial->email,
            'id'=>$update->poID,
            'prID'=>$update->prID,
            'procurmer'=>$update->pocumerName,
        ];

        //  dd($details['name']);

        $update->poStatus=$request->status;
        $update->remarks_lead=$request->remarks_lead;
        $update->save();


        $finds=PRModel::where('reqno','=',$reqID)->first();
        // dd($finds->status_now);
        $finds->status_now=$request->status;
        $finds->remarks_lead=$request->remarks_lead;

        if($request->status=='PO_Approved'){
               Mail::to($financial->email)->send(new FinancialPOMail($details));
            $save=$finds->save();
                if($save){
                    return redirect('program/final')->with('success','Purchase order has been forwarded to finance team. The process completed successfully');
                }else{
                    return redirect('program/final')->with('error','PO has not created');
                }

        }else{
            Mail::to($update->pocumerEmail)->send(new RejectedPOMail($details));
            $save=$finds->save();
            if($save){
                return redirect('program/final')->with('success','Purchase order is rejected and rejected mail is sent to procurement manager');
            }else{
                return redirect('program/final')->with('error','PO has not created');
            }

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