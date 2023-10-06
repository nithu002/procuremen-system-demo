<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\PRModel;
use App\Models\Supervoicer;
use App\Models\Staff;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= array();
           if(Session::has('loginId')){
            $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
           }

        $approved=PRModel::where('status_now','=','PO_Approved')->count();
        $pedd=PRModel::whereNot('status_now','=','PO_Approved')->count();
        $rejected=PRModel::where('status_now','PR_Rejected')->count();
        $rejected1=PRModel::where('status_now','Quo_Rejected')->count();
        $rej=$rejected+$rejected1;
        $pedding=$pedd-$rej-1;
        // dd($approved,$rej,$pedding);


        $user=Staff::get()->count();
        $super=Supervoicer::get()->count();



        //$adminID=admin::where('id',$data->id)->first();
        return view('admin.settings.profile',compact('data','user','approved','pedding'));
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

          $findID =Admin::find($request->id);
          $updatePassword= Hash::check($request->old_password, $findID->password);
          if($updatePassword){
            Admin::find($request->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            return redirect('/profile')->with('success','Password Update Successfully');
          }else{
            return redirect('/profile')->with('warning','Current Password does not match with Old Password');

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
            $user=Admin::find($request->id);
            $user->user_img=$updateIMG;
            if($user->save()){
                echo 200;
            }else{
                echo 700;
            }

        }else{
            return redirect('/profile')->with('warning','Please Select Image');
        }
    }

    /**
     * Display the specified resource.
     */
    public function about(Request $request)
    {
        //
        $user=Admin::find($request->id);
        $user->location= $request->location;
        $user->education= $request->education;
        $user->save();
        return redirect('/profile')->with('success',' Details Update Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, Admin $admin)
    {
        //
        if($request->ajax()){
            $admin->find($request->pk)->update(['name'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function any(Request $request, Admin $admin)
    {
        //
        if($request->ajax()){
            $admin->find($request->pk)->update(['email'=>$request->value]);
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
        $findID =Admin::find($request->id);
          $updatePassword= Hash::check($request->password, $findID->password);
          if($updatePassword){
            $delete=Admin::find($request->id);
            $delete->delete();
            return redirect('/')->with('success','Record Deleted Successfully');
          }else{
            return redirect('/profile')->with('warning','Current Password does not match with Old Password');
          }

    }
}
