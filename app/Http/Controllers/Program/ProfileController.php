<?php

namespace App\Http\Controllers\Program;

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
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }

         $alert=POdetail::where('poStatus','final')->count();

         return view('program.settings.profile',compact('data','alert'));

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

          $findID =Programeleade::find($request->id);

          if($request->old_password == $findID->password){
            Programeleade::find($request->id)->update([
                'password'=>$request->password,
            ]);
            return redirect('program/profile')->with('success','Password Update Successfully');
          }else{
            return redirect('program/profile')->with('warning','Current Password does not match with Old Password');

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
            $user=Programeleade::find($request->id);
            $user->user_img=$updateIMG;
            if($user->save()){
                echo 200;
            }else{
                echo 700;
            }

        }else{
            return redirect('program/profile')->with('warning','Please Select Image');
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
    public function any(Request $request, Programeleade $Programeleade)
    {
        //
        if($request->ajax()){
            $Programeleade->find($request->pk)->update(['email'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programeleade $Programeleade)
    {
        //
        if($request->ajax()){
            $Programeleade->find($request->pk)->update(['name'=>$request->value]);
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
        $findID =Programeleade::find($request->id);
          if($request->password == $findID->password){
            $delete=Programeleade::find($request->id);
            $delete->delete();
            return redirect('/program')->with('success','Your user account successfully deleted. If you have any ongoing matters with us, Please contact administrator.');
          }else{
            return redirect('program/profile')->with('warning','Current Password does not match with Old Password');
          }

    }
}
