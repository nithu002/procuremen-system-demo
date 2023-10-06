<?php

namespace App\Http\Controllers\Financial;

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
use App\Models\finacial;

class loginController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('auth.financial.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function lock()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=finacial::where ('id','=',Session::get('loginId'))->first() ;
        }

           return view('auth.financial.lockscreen',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd('hi');
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        $user=finacial::where('email','=',$request->email)->first();
        if($user){
            if($request->password==$user->password){


                $request->session()->put('loginId',$user->id);
                return redirect('financial/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
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
         $data=finacial::where ('id','=',Session::get('loginId'))->first() ;
        }



        $user=Staff::get()->count();

        $expenses=POdetail::get('totalPO')->sum('totalPO');

        $totalPO=POdetail::where('poStatus','PO_Approved')->get()->count();
        $new=POdetail::where('poStatus','PO_Approved')->latest()->paginate(4);


          $new1=$new->count();

//  dd($result1);
            return view('financial.dasboard', compact('data','user','new','expenses','totalPO','new1'))->with('success','You have login successfully');






                // $new=POdetail::where('poStatus','PO_Approved')->latest()->paginate(4);







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
         $data=finacial::where ('id','=',Session::get('loginId'))->first() ;
        }

        if($request->password == $data->password){

            return redirect('financial/dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
        }else{
            return redirect('financial/lock')->with('error','Invalid Password');
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
            return redirect('/financial')->with('success','You have logout successfully');
        }

    }

}