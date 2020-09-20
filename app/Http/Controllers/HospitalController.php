<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HospitalController extends Controller
{
    public function index(){
        $user = DB::table('users')->get();
        return view('insertHospital',compact('user'));
    }

    public function insertHospitalDetails(Request $request){
        $user = DB::table('users')->get();
        DB::table('referhospitals')->insert(['referHospitals'=>$request->hospitals]);

        $info = DB::table('referhospitals')->get();

        return view('showHospitals',compact('info','user'));
    }

    public function showHospitals(){
        $user = DB::table('users')->get();
        $info = DB::table('referhospitals')->get();

        return view('showHospitals',compact('info','user'));
    }

    public function editHospital(Request $request){
        $user = DB::table('users')->get();
        $data = DB::table('referhospitals')->where(['id'=>$request->id])->get();
        return view('editHospital',compact('data','user'));
    }

    public function editHospitalFinal(Request $request){
        $user = DB::table('users')->get();
        DB::table('referhospitals')->where(['id'=>$request->id])->update(['referHospitals'=>$request->referHospital]);

        $info = DB::table('referhospitals')->get();
        return view('showHospitals',compact('info','user'));
    }

    public function deleteHospital(Request $request){
        $user = DB::table('users')->get();
        DB::table('referhospitals')->where(['id'=>$request->id])->delete();

        $info = DB::table('referhospitals')->get();
        
        return view('showHospitals',compact('info','user'));
    }
}
