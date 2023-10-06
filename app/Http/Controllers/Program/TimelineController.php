<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programeleade;
use Session;
use DB;
use App\Models\POdetail;
use App\Models\PRModel;
use App\Models\Prodect;
use Illuminate\Support\Carbon;
use App\Models\PO_prodect;


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
            $data=Programeleade::where('id','=',Session::get('loginId'))->first();
        }
           $alert=POdetail::where('poStatus','final')->count();

        $filterRequest=PRModel::whereNot('status_now','=','status')->latest()->paginate(6);

        $ID=POdetail::whereNot('poStatus','=','Quo_Approved')
        ->whereNot('poStatus','=','Sample')
        ->whereNot('poStatus','=','finacial')
        ->whereNot('poStatus','=','final')
        ->get();




                return view('program.timeline',compact('data','filterRequest','alert','ID'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function new($id)
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Programeleade::where('id','=',Session::get('loginId'))->first();
        }
           $alert=POdetail::where('poStatus','final')->count();
        $details=PRModel::find($id);
        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        return view('program.views.new',compact('details','tables','data','alert'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function pr( $id)
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Programeleade::where('id','=',Session::get('loginId'))->first();
        }
         $alert=POdetail::where('poStatus','final')->count();
        $details=PRModel::find($id);
        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        return view('program.views.PR-View',compact('details','tables','data','alert'));
    }

    /**
     * Display the specified resource.
     */
    public function quotation(string $id)
    {
        //
        $data=array();
        if(Session::has('loginId')){
            $data=Programeleade::where('id','=',Session::get('loginId'))->first();
        }
          $alert=POdetail::where('poStatus','final')->count();
        $details=PRModel::find($id);
        $tables=Prodect::where('reqno','=',$details->reqno)->get();
        return view('program.views.quotation',compact('details','tables','data','alert'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function PO(string $id)
    {
        //
        $data= array();
        if(Session::has('loginId')){
         $data=Programeleade::where ('id','=',Session::get('loginId'))->first() ;
        }

          $alert=POdetail::where('poStatus','final')->count();

        $details=POdetail::where('prID','=',$id)->first();

        $tables=PO_prodect::where('poID','=',$details->poID)->get();
        $date=Carbon::today();




        return view('program.views.PO-View',compact('data','details','tables','date','alert'));


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