<?php

namespace App\Http\Controllers\Procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programeleade;
use Session;
use DB;
use App\Models\Procurement;
use App\Models\PO_prodect;
use App\Models\POdetail;
use Illuminate\Support\Carbon;
use App\Models\PRModel;

class Profile extends Controller
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





         return view('Procurement.settings.profile',compact('conts','cont','data'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function password(Request $request)
    {
        //
        $request->validate([
            'old_password'=>'required|min:6',
            'password'=>'required|min:6|confirmed',

          ]);

          $findID =Procurement::find($request->id);

          if($request->old_password == $findID->password){
            Procurement::find($request->id)->update([
                'password'=>$request->password,
            ]);
            return redirect('/procurementPanel/profile')->with('success','Password Update Successfully');
          }else{
            return redirect('/procurementPanel/profile')->with('warning','Current Password does not match with Old Password');

          }
    }

    /**
     * Store a newly created resource in storage.
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
            $user=Procurement::find($request->id);
            $user->user_img=$updateIMG;
            if($user->save()){
                echo 200;
            }else{
                echo 700;
            }

        }else{
            return redirect('procurementPanel/profile')->with('warning','Please Select Image');
        }
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
    public function update(Request $request, Procurement $Procurement)
    {
        //
        if($request->ajax()){
            $Procurement->find($request->pk)->update(['name'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }

    public function any(Request $request, Procurement $Procurement)
    {
        //
        if($request->ajax()){
            $Procurement->find($request->pk)->update(['email'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $request->validate([
            'password'=>'required|min:6',
        ]);
        $findID =Procurement::find($request->id);
          if($request->password == $findID->password){
            $delete=Procurement::find($request->id);
            $delete->delete();
            return redirect('/procurementPanel')->with('success','Your user account successfully deleted. If you have any ongoing matters with us, Please contact administrator.');
          }else{
            return redirect('procurementPanel/profile')->with('warning','Password does not match');
          }

    }
}
