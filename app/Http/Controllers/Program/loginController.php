<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programeleade;
use Session;
use App\Models\PRModel;
use Illuminate\Support\Carbon;
use App\Models\POdetail;
use App\Models\Staff;
use App\Models\Supervoicer;
use DB;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.program.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function lock()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }

           return view('auth.program.lockscreen',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $user=Programeleade::where('email','=',$request->email)->first();
        if($user){
            if($request->password==$user->password){


                $request->session()->put('loginId',$user->id);
                return redirect('program/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
            }
            else{
                return back()->with('fail','Password is not match');
            }
        }else{
            return back()->with('fail','This email not register ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function dashboard()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }
                //THIS FOR STAFF REQUEST DATE(LINE CHART JS)
                //THIS FOR STAFF REQUEST DATE(LINE CHART JS)
        // $reqs=PRModel::select('created_at')->orderBy('id','desc')->get()->groupBy(function($reqs){
        //     return Carbon::parse($reqs->created_at)->format('M');
        // });
        // $reqs=PRModel::select('created_at')->orderBy('id','desc')->get()->groupBy('MONTH(created_at)');
        $reqs=DB::table('requests')
        ->select(DB::raw('COUNT(*)  as totals'),DB::raw('month(created_at) as dates'))
        ->groupBy('dates')
        ->orderBy('dates','asc')
        ->whereNot('status_now','status')
        ->get();

        //dd($reqs);


        $staff=[];
        $monthcount=[];
        foreach($reqs as $staffs =>$values){
            $staff[]=$values->dates;
            $monthcount[]=(int)$values->totals;
        }

    //TIHS FOR MOTHLY COST FOR THAT(LINE CHART JS)
        $outcome=DB::table('p_odetails')
        ->select(DB::raw('month(created_at) as Months'),DB::raw('SUM(totalPO) as total')
        )->whereNot('poStatus','PO_Rejected')
        ->whereNot('poStatus','final')
        ->orderBy('Months','asc')
        ->groupBy('Months')
        ->get();

    // dd($outcome);

        $result = [];
        $year=[];
        foreach ($outcome as $key => $value) {

            $year[]=$value->Months;
            $result[] =(int)$value->total;
        }


                $all=PRModel::all()->count();
                $final=$all-1;
                // dd($final);
                $approved=PRModel::where('status_now','=','PO_Approved')->count();
                $pedd=PRModel::whereNot('status_now','=','PO_Approved')->count();
                $rejected=PRModel::where('status_now','PR_Rejected')->count();
                $rejected1=PRModel::where('status_now','Quo_Rejected')->count();
                $rej=$rejected+$rejected1;
                $pedding=$pedd-$rej-1;
                // dd($approved,$rej,$pedding);
                $alert=POdetail::where('poStatus','final')->count();

                $user=Staff::get()->count();
                $super=Supervoicer::get()->count();
               $expe=POdetail::where('poStatus','=','PO_Approved')->get('totalPO')->sum('totalPO');
               $exp=POdetail::where('poStatus','=','finacial')->get('totalPO')->sum('totalPO');
               $expenses=$expe+$exp;

                $status = ['Approved','Rejected','Pending'];
                $count=[$approved,$rej,$pedding];

                //dd($expenses);

                $new=POdetail::whereNot('poStatus','Quo_Approved')
                             ->whereNot('poStatus','final')
                             ->whereNot('poStatus','PO_Rejected')
                             ->whereNot('poStatus','Quo_Rejected')
                             ->whereNot('poStatus','Sample')->latest()->paginate(4);






         return view('program.dashboard', compact('data','new','result','super','expenses','status','user','alert','final','count','year','staff','monthcount'))->with('success','You have login successfully');
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
    public function lockscreen(Request $request)
    {
        //
        $request->validate([
            'password'=>'required|min:6',
        ]);
        $data= array();
        if(Session::has('loginId')){
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }

        if($request->password == $data->password){

            return redirect('program/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
        }else{
            return redirect('program/lock')->with('error','Invalid Password');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        //
        if(Session::has('loginId')){
            Session ::pull('loginId');
            return redirect('/lead')->with('success','You have logout successfully');
        }

    }
}