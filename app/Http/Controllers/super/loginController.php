<?php

namespace App\Http\Controllers\super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Models\Supervoicer;
use App\Models\PRModel;
use App\Models\Staff;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.super_visor.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function lock()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }

           return view('auth.super_visor.lockscreen',compact('data'));
    }
    public function lockscreen(Request $request)
    {
        //
        $request->validate([
            'password'=>'required|min:6',
        ]);
        $data= array();
        if(Session::has('loginId')){
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }

        if($request->password == $data->password){

            return redirect('viocer/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
        }else{
            return redirect('voiser/lockscreen')->with('error','Invalid Password');
        }
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
        $user=Supervoicer::where('email','=',$request->email)->first();
        if($user){
            if($request->password==$user->password){
                $request->session()->put('loginId',$user->id);
                return redirect('viocer/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
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
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }

        $filterRequest=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','new')->get();
                               $cont = $filterRequest->count();
                               $conts=PRModel::where('supervisor_name','=',$data->name)
        ->where('status_now','=','quotation')->count();

        $staffcont=Staff::where('supervisor_name','=',$data->name)->count();

        $accepted=PRModel::where('status_now','=','PR_Approved')
                      ->where('supervisor_name','=',$data->name)->count();
                    //   dd($accepted);
        $rejected=PRModel::where('status_now','=','PR_Rejected')
                      ->where('supervisor_name','=',$data->name)->count();

        $Qaccepted=PRModel::where('status_now','=','Quo_Approved')
                      ->where('supervisor_name','=',$data->name)->count();
                    //   dd($accepted);
        $Qrejected=PRModel::where('status_now','=','Quo_Rejected')
                      ->where('supervisor_name','=',$data->name)->count();


         return view('super_visor.dashboard', compact('data','rejected','accepted','Qrejected','Qaccepted','cont','staffcont','conts'))->with('success','You have login successfully');
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
    public function logout()
    {
        //
        if(Session::has('loginId')){
            Session ::pull('loginId');
            return redirect('/supervisor')->with('success','You have logout successfully');
        }
    }
}