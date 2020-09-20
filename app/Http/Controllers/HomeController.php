<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = DB::table('users')->get();
        $d = date('Y-m-d');
        $t=date('H:i:s');
        $date = Carbon::parse(date('Y-m-d H:i:s'));
        $date->addHours(1);
        $array=array();
        global $message;

        if(DB::table('phpatients')->where(['appointment'=>$d])->count()>0){
         $info = DB::table('phpatients')->where(['appointment'=>$d])
        ->orderBy('phpatients.time','asc')
        ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
        ->select('phpatients.*','diagnoses.*')
        ->get();

        $i = 1;
        $l = 1;

        foreach($info as $k=>$v)            
            if($v->time>$t && $i<=5){
                array_push($array,$v->diagnosis);
                         
                 $i++;
            }
            $result = array_count_values($array);
        }else{
            $message='There is no appointment for today';
        }
        
        
        
        if($message){
            return view('dashboardMessage',compact('message','user'));
        }else{
        return view('home', compact('user','l','info','t','result'));
        }
    }
}
