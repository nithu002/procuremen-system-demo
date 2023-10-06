<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
use App\Models\PRModel;
use App\Models\Prodect;
use App\Models\POdetail;
use Illuminate\Support\Carbon;
use App\Models\PO_prodect;
use App\Models\Programeleade;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Admin::where('id','=',Session::get('loginId'))->first();
        }
        $filterRequest=PRModel::whereNot('status_now','=','status')->latest()->paginate(6);


                return view('admin.timeline',compact('data','filterRequest'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function new($id)
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Admin::where('id','=',Session::get('loginId'))->first();
        }
        $details=PRModel::find($id);
        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        return view('admin.views.new',compact('details','tables','data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pr($id)
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Admin::where('id','=',Session::get('loginId'))->first();
        }
        $details=PRModel::find($id);
        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        return view('admin.views.PR-View',compact('details','tables','data'));
    }

    /**
     * Display the specified resource.
     */
    public function quotation(string $id)
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Admin::where('id','=',Session::get('loginId'))->first();
        }
        $details=PRModel::find($id);
        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        return view('admin.views.quotation',compact('details','tables','data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function PO(string $id)
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Admin::where ('id','=',Session::get('loginId'))->first() ;
        }



        $details=POdetail::where('prID','=',$id)->first();

        $tables=PO_prodect::where('poID','=',$details->poID)->get();
        $date=Carbon::today();
       $pro=Programeleade::first();





        return view('admin.views.PO-View',compact('data','details','tables','pro','date'));
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
    public function destroy(string $id)
    {
        //
    }
}