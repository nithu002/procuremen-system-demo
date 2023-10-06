<?php

namespace App\Http\Controllers\super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Supervoicer;
use App\Models\PRModel;
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
         $data=Supervoicer::where ('id','=',Session::get('loginId'))->first() ;
        }
        $staffcont=Staff::where('supervisor_name','=',$data->name)->count();

        $accepted=PRModel::where('status_now','=','PR_Approved')
        ->where('supervisor_name','=',$data->name)->count();
        $rejected=PRModel::where('status_now','=','PR_Rejected')
        ->where('supervisor_name','=',$data->name)->count();



         $cont=PRModel::where('supervisor_name','=',$data->name)
                               ->where('status_now','=','new')->count();
         $conts=PRModel::where('supervisor_name','=',$data->name)
            ->where('status_now','=','quotation')->count();
                               return view('super_visor.settings.profile',compact('conts','rejected','accepted','staffcont','data','cont'));
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

          $findID =Supervoicer::find($request->id);

          if($request->old_password == $findID->password){

            Supervoicer::find($request->id)->update([
                'password'=>$request->password,
            ]);
            return redirect('viocer/profile')->with('success','Password Update Successfully');
          }else{
            return redirect('viocer/profile')->with('warning','Current Password does not match with old Password');

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
            $user=Supervoicer::find($request->id);
            $user->user_img=$updateIMG;
            if($user->save()){
                echo 200;
            }else{
                echo 700;
            }

        }else{
            return redirect('viocer/profile')->with('warning','Please Select Image');
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
    public function update(Request $request, Supervoicer $super)
    {
        //
        if($request->ajax()){
            $super->find($request->pk)->update(['name'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function any(Request $request, Supervoicer $super)
    {
        //
        if($request->ajax()){
            $super->find($request->pk)->update(['email'=>$request->value]);
            return response()->json(['success'=>true]);
        }
    }
    public function destroy(Request $request)
    {
        //
        $request->validate([
            'password'=>'required|min:6',
        ]);
        $findID =Supervoicer::find($request->id);
          if($request->password == $findID->password){
            $delete=Supervoicer::find($request->id);
            $delete->delete();
            return redirect('/viocer')->with('success','Your user account successfully deleted. If you have any ongoing matters with us, Please contact administrator.');
          }else{
            return redirect('viocer/profile')->with('warning','Current Password does not match with Old Password');
          }

    }
}
