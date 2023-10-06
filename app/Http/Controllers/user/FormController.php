<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Supervoicer;
use Illuminate\Support\Carbon;
use DB;
use App\Models\PRModel;
use App\Models\Prodect;
use Mail;
use App\Mail\RequestSuperMail;
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the last order id
        $lastorderId = PRModel::orderBy('id', 'desc')->first()->id;
        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, -3);
        // Make a new order id with appending last increment + 1
        $newOrderId = 'PR' .'-'. date('md').'-' . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

       $date=Carbon::today();
        $data=([
            'reqno'=>$newOrderId,
            'date'=>$date,

        ]);
        $staff= Staff::latest()->get();
        return view('user.index',compact('staff','data'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function getData($id)
    {
        //
        echo json_encode(DB::table('staffs')->where('name', $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'file_tor'=>'required',
            'file_cn'=>'required'
        ]);
        $status='new';
        if($request->hasFile('file_tor')){
        $completeFileName = $request->file('file_tor')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('file_tor')->getClientOriginalExtension();
        $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
        $path = $request->file('file_tor')->move('storage/files/', $compPic);
        $fileName1 = $compPic;

        }

        if($request->hasFile('file_cn')){
        $completeFileName = $request->file('file_cn')->getClientOriginalName();
        $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
        $extension = $request->file('file_cn')->getClientOriginalExtension();
        $compPic = str_replace(' ', '_', $fileNameOnly).'.'.$extension;
        $path = $request->file('file_cn')->move('storage/files/', $compPic);
        $fileName2 = $compPic;
        }


        $all= new PRModel();
        $all->reqno=$request->reqno;
        $all->req_name=$request->staff_name;
        $all->email=$request->email;
        $all->reqdate=$request->reqdate;
        $all->wbsnumber=$request->wbsnumber;
        $all->budget=$request->budget;
        $all->actual=$request->actual;
        $all->scheduled=$request->scheduled;
        $all->balance=$request->balance;
        $all->purpose=$request->purpose;
        $all->purpose=$request->purpose;
        $all->FTotal=$request->FTotal;
        $all->need_date=$request->need_date;

        $all->file_tor=$fileName1;
        $all->file_cn=$fileName2;
        $all->supervisor_name=$request->supervisor_name;
        $all->supervisor_email=$request->supervisor_email;
        $all->status_now=$status;
        $details = [
            'supervisor_name' => $request->supervisor_name,
            'req_name'=>$request->req_name,
            'reqdate'=>$request->reqdate,
            ];
        $all->save();


        $getRequestID = DB::table('requests')->orderBy('id','DESC')->select('reqno')->first();
        $getID=$getRequestID->reqno;
        $no=1;

        // dd($getID);


        foreach($request->description as $key => $description){

            $data['no']         = $no;
            $data['reqno']      = $getID;
            $data['description']= $request->description[$key];
            $data['specification']=$request->specification[$key];
            $data['qty']        = $request->qty[$key];
            $data['rate']       = $request->rate[$key];
            $data['amt']        = $request->amt[$key];

            Prodect::insert($data);

       }
       if($all->save()){


        Mail::to($request->supervisor_email)->send(new RequestSuperMail($details));
       }
       return view('user.success_page',compact('getRequestID'));


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}