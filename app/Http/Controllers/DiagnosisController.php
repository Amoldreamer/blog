<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DiagnosisController extends Controller
{
    public function insertDiagnosis(){
        $user = DB::table('users')->get();
        return view('insertDiagnosis','user');
    }

    public function insertDiagnosisDetails(Request $request){
        $user = DB::table('users')->get();
        DB::table('diagnoses')->insert(['diagnosis'=>$request->diagnosis]);

        $info = DB::table('diagnoses')->get();

        return view('showDiagnosis',compact('info','user'));
    }

    public function showDiagnosis(){
        $user = DB::table('users')->get();
        $info = DB::table('diagnoses')->get();

        return view('showDiagnosis',compact('info','user'));
    }

    public function editDiagnosis(Request $request){
        $user = DB::table('users')->get();
        $data = DB::table('diagnoses')->where(['id'=>$request->id])->get();
        return view('editDiagnosis',compact('data','user'));
    }

    public function editDiagnosisFinal(Request $request){
        $user = DB::table('users')->get();
        DB::table('diagnoses')->where(['id'=>$request->id])->update(['diagnosis'=>$request->diagnosis]);

        $info = DB::table('diagnoses')->get();
        return view('showDiagnosis',compact('info','user'));
    }

    public function deleteDiagnosis(Request $request){
        $user = DB::table('users')->get();
        DB::table('diagnoses')->where(['id'=>$request->id])->delete();

        $info = DB::table('diagnoses')->get();
        
        return view('showDiagnosis',compact('info','user'));
    }
}
