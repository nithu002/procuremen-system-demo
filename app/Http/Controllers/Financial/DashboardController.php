<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use App\Mail\POSentMail;
use App\Mail\POSentMailLead;
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
use App\Models\Programeleade;
use App\Models\finacial;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=finacial::where ('id','=',Session::get('loginId'))->first() ;
        }



        $filterRequest=POdetail::whereNot('poStatus','=','Quo_Approved')
                            ->whereNot('poStatus','=','Sample')
                            ->whereNot('poStatus','=','final')
                            ->whereNot('poStatus','=','PO_Rejected')
                  ->get();





         return view('financial.financial',compact('data','filterRequest'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function profile()
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=finacial::where ('id','=',Session::get('loginId'))->first() ;
        }

        return view('financial.settings.profile',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function password(Request $request)
    {
        //
        $request->validate([
            'old_password'=>'required|min:6',
            'password'=>'required|min:6|confirmed',

          ]);

          $findID =finacial::find($request->id);

          if($request->old_password == $findID->password){
            finacial::find($request->id)->update([
                'password'=>$request->password,
            ]);
            return redirect('financial/profile')->with('success','Password Update Successfully');
          }else{
            return redirect('financial/profile')->with('warning','Current Password does not match with Old Password');

          }
    }

    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=finacial::where ('id','=',Session::get('loginId'))->first() ;
        }
            $details=POdetail::find($id);
            $details->poStatus='finacial';
            $save=$details->save();
            $lead=Programeleade::first();
            // dd($lead->name);
            if($save){
                $tables=PO_prodect::where('poID','=',$details->poID)->get();
                return view('financial.view',compact('data','details','lead','tables'));

            }else{
                return redirect('financial/request')->with('error','Something went wrong. Please try again');
            }







    }

    /**
     * Show the form for editing the specified resource.
     */
    public function img(Request $request)
    {
        //
        if ($request->hasFile('picture')) {
            $completeFileName = $request->file('picture')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
            $path = $request->file('picture')->move('storage/users', $compPic);
            $updateIMG = 'users/'.$compPic;
            $user=finacial::find($request->id);
            $user->user_img=$updateIMG;
            if($user->save()){
                echo 200;
            }else{
                echo 700;
            }

        }else{
            return redirect('financial/profile')->with('warning','Please Select Image');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, finacial $finacial)
    {
        //
        if($request->ajax()){
            $finacial->find($request->pk)->update(['name'=>$request->value]);
            return response()->json(['success'=>true]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function any(Request $request, finacial $finacial)
    {
        //
        if($request->ajax()){
            $finacial->find($request->pk)->update(['email'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }

    // public function destroy(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'password'=>'required|min:6',
    //     ]);
    //     $findID =Procurement::find($request->id);
    //       if($request->password == $findID->password){
    //         $delete=Procurement::find($request->id);
    //         $delete->delete();
    //         return redirect('/procurementPanel')->with('success','Your user account successfully deleted. If you have any ongoing matters with us, Please contact administrator.');
    //       }else{
    //         return redirect('procurementPanel/profile')->with('warning','Password does not match');
    //       }

    // }
}
