<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Session;
use DB;
use App\Models\PRModel;
use Illuminate\Support\Carbon;
use App\Models\POdetail;
use App\Models\Staff;
use App\Models\Supervoicer;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        return view('auth.admin.login');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auth.admin.register');
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
        $user=Admin::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard')->with('success','Hello! 👋 Welcome back to your dashboard');
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
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|confirmed|min:4',
        ]);
         $user= new Admin();
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password= Hash::make($request->password);
         $data= $user->save();

         if($data){
            return back()->with('success','You have registered Successfully');
         }else{
            return back()->with('fail','Somethings error please try again');
         }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function dashboard()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=admin::where ('id','=',Session::get('loginId'))->first() ;
        }

        $reqs=DB::table('requests')
        ->select(DB::raw('COUNT(*)  as totals'),DB::raw('date(created_at) as dates'))
        ->groupBy('dates')
        ->orderBy('dates','asc')
        ->whereNot('status_now','status')
        ->get();

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


        $result = [];
        $year=[];
        foreach ($outcome as $key => $value) {

            $year[]=$value->Months;
            $result[] =(int)$value->total;
        }



        $all=PRModel::all()->count();
        $final=$all-1;
        $approved=PRModel::where('status_now','=','PO_Approved')->count();
        $pedd=PRModel::whereNot('status_now','=','PO_Approved')->count();
        $rejected=PRModel::where('status_now','PR_Rejected')->count();
        $rejected1=PRModel::where('status_now','Quo_Rejected')->count();


        $rej=$rejected+$rejected1;
        $pedding=$pedd-$rej-1;


        $user=Staff::get()->count();
        $super=Supervoicer::get()->count();
        $expe=POdetail::where('poStatus','=','PO_Approved')->get('totalPO')->sum('totalPO');
        $exp=POdetail::where('poStatus','=','finacial')->get('totalPO')->sum('totalPO');
        $expenses=$expe+$exp;
        $status = ['Approved','Rejected','Pending'];
        $count=[$approved,$rej,$pedding];

        $new=POdetail::whereNot('poStatus','Quo_Approved')
                             ->whereNot('poStatus','final')
                             ->whereNot('poStatus','PO_Rejected')
                             ->whereNot('poStatus','Quo_Rejected')
                             ->whereNot('poStatus','Sample')->latest()->paginate(4);

         return view('admin.dashboard', compact('data','new','result','super','expenses','status','user','final','count','year','staff','monthcount'))->with('success','You have login successfully');
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

        if(Session::has('loginId')){
            Session ::pull('loginId');
            return redirect('/admin')->with('success','You have logout successfully');
        }
    }
}
