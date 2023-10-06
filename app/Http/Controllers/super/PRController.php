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
use App\Models\Staff;
class PRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $staff= Staff::latest()->get();

        $data= array();
        if(Session::has('loginId')){
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }

        $filterRequest=PRModel::where('supervisor_name','=',$data->name)
                               ->whereNot('status_now','=','new')
                               ->whereNot('status_now','=','quotation')
                               ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected')
                               ->get();
         $cont=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','new')->count();
         $conts=PRModel::where('supervisor_name','=',$data->name)
            ->where('status_now','=','quotation')->count();
                               return view('super_visor.PR',compact('filterRequest','conts','data','cont','staff'));



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


        return view('super_visor.PR-view',compact('data','cont','conts','details','tables','date','procument'));
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
            return redirect('viocer/all')->with('success', 'Update the details');
        }else{
            return redirect('viocer/all')->with('error', 'Somethings error please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function filderID(Request $request)
    {
        //
        $data= array();
         if(Session::has('loginId')){
            $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
          }


        $dateFilter = $request->date_filter;
        $Status=$request->status;
        $Name=$request->staff_name;
        $filterRequest= PRModel::query();

        switch($dateFilter){
            case 'today':
                $filterRequest->whereDate('created_at',Carbon::today())
                      ->where('supervisor_name','=',$data->name)
                      ->whereNot('status_now','=','new')
                      ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'yesterday':
                $filterRequest->wheredate('created_at',Carbon::yesterday())
                      ->where('supervisor_name','=',$data->name)
                      ->whereNot('status_now','=','new')
                      ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'this_week':
                $filterRequest->whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])
                       ->where('supervisor_name','=',$data->name)
                       ->whereNot('status_now','=','new')
                       ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'last_week':
                $filterRequest->whereBetween('created_at',[Carbon::now()->subWeek(),Carbon::now()])
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new')
                     ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'this_month':
                $filterRequest->whereMonth('created_at',Carbon::now()->month)
                      ->where('supervisor_name','=',$data->name)
                      ->whereNot('status_now','=','new')
                      ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'last_month':
                $filterRequest->whereMonth('created_at',Carbon::now()->subMonth()->month)
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new')
                     ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'this_year':
                $filterRequest->whereYear('created_at',Carbon::now()->year)
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new')
                     ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
            case 'last_year':
                $filterRequest->whereYear('created_at',Carbon::now()->subYear()->year)
                      ->where('supervisor_name','=',$data->name)
                      ->whereNot('status_now','=','new')
                      ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
        }
         switch($Status){
             case 'all':
                $filterRequest->where('supervisor_name','=',$data->name)
                              ->whereNot('status_now','=','new');
                  break;
             case 'PR_Approved':
                $filterRequest->where('status_now','=','PR_Approved')
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new')
                     ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                 break;
             case 'PR_Rejected':
                $filterRequest->where('status_now','=','PR_Rejected')
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new');
                    break;
             case 'Quo_Approved':
                $filterRequest->where('status_now','=','Quo_Approved')
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new')
                     ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                    break;
             case 'Quo_Rejected':
                $filterRequest->where('status_now','=','Quo_Rejected')
                     ->where('supervisor_name','=',$data->name)
                     ->whereNot('status_now','=','new')
                     ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                    break;

         }
         switch($Name){
            case 'all':
               $filterRequest->where('supervisor_name','=',$data->name)
                             ->whereNot('status_now','=','new')
                             ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                 break;
            case $Name:
               $filterRequest->where('req_name','=',$Name)
                    ->where('supervisor_name','=',$data->name)
                    ->whereNot('status_now','=','new')
                    ->whereNot('status_now','=','PO_Approved')
                               ->whereNot('status_now','=','PO_Rejected');
                break;
         }
        $filterRequest = $filterRequest->get();



        $staff= Staff::latest()->get();

        $conts=PRModel::where('supervisor_name','=',$data->name)
        ->where('status_now','=','quotation')->count();
        $cont=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','new')->count();
                               return view('super_visor.PR',compact('filterRequest','data','conts','cont','staff'));



    }
}
