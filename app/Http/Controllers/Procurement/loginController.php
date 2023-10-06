<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Procurement;
use Session;
use App\Models\PRModel;
use App\Models\POdetail;
use Carbon\CarbonImmutable;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.procurment.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function lock()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Procurement::where ('id','=',Session::get('loginId'))->first() ;
        }

           return view('auth.procurment.lockscreen',compact('data'));
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
        $user=Procurement::where('email','=',$request->email)->first();
        if($user){
            if($request->password==$user->password){
                $request->session()->put('loginId',$user->id);
                return redirect('procurementPanel/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
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
         $data=Procurement::where ('id','=',Session::get('loginId'))->first() ;
        }
        $conts=PRModel::where('procument_name','=',$data->name)
        ->where('status_now','=','PR_Approved')->count();
        $cont=POdetail::where('pocumerName','=',$data->name)
                               ->where('poStatus','=','Quo_Approved')->count();


        $total=PRModel::where('procument_name','=',$data->name)
                       ->where('status_now','=','Quo_Approved')->count();

        $approved=PRModel::where('procument_name','=',$data->name)
                        ->count('seleded_quotation');

        $approvedName=PRModel::where('procument_name','=',$data->name)
                        ->whereNot('status_now','Quo_Approved')
                        ->whereNot('status_now','final')
                        ->whereNot('status_now','PR_Approved')
                        ->whereNot('status_now','PO_Approved')->latest()->get();
                        // dd($approvedName);

                     $pending=$approvedName->count();
                     
                     $pen=$conts + $pending;




         return view('Procurement.dashboard', compact('data','cont','approvedName','approved','pen','conts','total'))->with('success','Hello! 👋 Welcome back to your dashboard');
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
         $data=Procurement::where ('id','=',Session::get('loginId'))->first() ;
        }

        if($request->password == $data->password){

            return redirect('procurementPanel/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
        }else{
            return redirect('procurementPanel/lock')->with('error','Invalid Password');
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
            return redirect('/procurementPanel')->with('success','You have logout successfully');
        }
    }
}
