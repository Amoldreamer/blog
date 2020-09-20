<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class AppointmentController extends Controller
{
    public function insertFollowups(Request $request){
        $user = DB::table('users')->get();

        $data = DB::table('phpatients')->where(["id"=>$request->id])->get();
        return view('insertFollowups',compact('data','user'));
    }

    public function insertPatientFollowups(Request $request){
        $user = DB::table('users')->get();
        $Validator = Validator::make($request->all(),[
            "register"=>"required",
            "customerName"=>"required",
            "appointment"=>"required"
        ],[
            "register.required"=>"Patientid should be filled",
            "appointment.required"=>"Appointment should be filled"
        ]);
        if($Validator->fails()){
            return redirect("insertFollowups")->withErrors($Validator);
        }else{
        $data = DB::table('phappointments')->insert(
            ["registration"=>$request->register, "customerName"=>$request->customerName, "Followup"=>$request->appointment,"nepaliAppo"=>$request->NepaliAppo,"Remarks"=>$request->remarks]
        );
    }
        if($data){
            $inserted = "Record inserted";
            return view('insertAppointments',compact('inserted','user'));
        }
        else{
            $inserted = "Record could not be inserted";
            return view('insertAppointments',compact('inserted','user'));
        }
    }

    public function patientAppointment(){
        $user = DB::table('users')->get();
        $data = DB::table('phappointments')->get();
        $i=0;
        return view('patientAppointment',compact('data','i','user'));
    }
    public function diagnosis(){
        $user = DB::table('users')->get();
        return view('diagnosis',compact('user'));
    }
    public function editAppointments(Request $request){
        $user = DB::table('users')->get();
        $Validator = Validator::make($request->all(),[
            "Followup"=>"required"
        ],
        [
            "Followup.required"=>"Appointment should be filled"
        ]
    );
        if($Validator->fails()){
            return redirect("editPatientAppointments")->where(['id'=>$request->id])->withErrors($Validator);
        }else{
            $data = DB::table('phappointments')->where(["id"=>$request->id])->update(
                ["Followup"=>$request->Followup, "nepaliAppo"=>$request->nepaliAppo,"Remarks"=>$request->remarks]
            );
        }
        
        if($data){
            $updated = "Table has been updated";
            return view("appointmentUpdateMessage",compact("updated",'user'));
        }
        else{
            $updated = "Table could not be updated";
            return view("appointmentUpdateMessage",compact("updated",'user'));
        }
    }

    public function deleteAppointments(){
        $user = DB::table('users')->get();
        $data = DB::table('phappointments')->get();
        $i=0;

        return view('deleteAppointments',compact('data','i','user'));
    }

    public function editAppointmentForm(Request $request){
        $user = DB::table('users')->get();
        $data = DB::table('phappointments')->where(["id"=>$request->id])->get();
        $i=0;
        
        return view('editAppointmentForm',compact('data','i','user'));
    }

    public function deleteAppointmentForm(Request $request){
        $user = DB::table('users')->get();
        $data = DB::table('phappointments')->where(["id"=>$request->id])->delete();
            $deleted = "Row has been deleted";
            return view("deleteAppointmentsMessage", compact("deleted",'user'));
    }

    public function editPatientAppointments(Request $request){
        $user = DB::table('users')->get();
        if($request->appointment == 'Appointment'){
            $refer = 1;
        }
        elseif($request->appointment == 'Followup'){
            $refer = 2;
        }
        
        DB::table('fandas')->insert(["Registration"=>$request->register,"appointment"=>$request->appointmentDate,"refer_idType"=>$refer,"appRemarks"=>$request->remarks]);
        return view('patientDashboard',compact('user'));
    }
    public function fanda(Request $request){
        $user = DB::table('users')->get();
        $status = DB::table('phstatuses')->get();
        $types = DB::table('phtypes')->get();
        $id = $request->id;
        $name = $request->name;
        $register = $request->register;
        return view('fanda',compact('id','name','register','status','types','user'));
    }

    public function fillFanda(Request $request){
        $user = DB::table('users')->get();
        
        $data = DB::table('fandas')->insert(["Registration"=>$request->register,"appointment"=>$request->appointment, "refer_idType"=>$request->fanda,"refer_idSta"=>"issued","appRemarks"=>$request->remarks]);
        $info = DB::table('fandas')->orderBy('created_at','desc')->first();
        
        if($data){
        $patient = DB::table('fandas')->where(["fandas.id"=>$info->id])
                ->join('phtypes','phtypes.id','=','fandas.refer_idType')
                ->join('phpatients','phpatients.register','=','fandas.Registration')
                ->select('fandas.*','phtypes.types','phpatients.*')
                ->get();
                
    
            return view('fandaMessage', compact('patient','user'));
        }
    }

    public function showStatus(Request $request){
        $user = DB::table('users')->get();
        $info = DB::table('fandas')->orderBy('created_at','desc')->first();
        $patient = DB::table('fandas')->where(["fandas.id"=>$info->id])
        ->join('phtypes','phtypes.id','=','fandas.refer_idType')
        ->join('phpatients','phpatients.register','=','fandas.Registration')
        ->select('fandas.*','phtypes.types','phpatients.*')
        ->get();           
        
                return view('fandaMessage', compact('patient'));
    }
    public function appointmentList(Request $request){
        $user = DB::table('users')->get();
        
        return view('appointmentList',compact('user'));
    }
    public function viewAppointment(Request $request){
        $user = DB::table('users')->get();
        $from = $request->from;
        $to = $request->to;
        $to = date('Y-m-d', strtotime($to. ' + 1 days'));
        $dates = DB::table('fandas')->whereBetween('fandas.appointment', [$from, $to])
                ->orderBy('fandas.appointment','asc')
                ->join('phpatients','fandas.Registration','=','phpatients.register')
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->select('phpatients.*','fandas.*',
                'phtypes.types','diagnoses.diagnosis','referdoctors.referDoctors','referhospitals.referHospitals')
                ->get();
        
        return view('viewAppointment', compact('dates','user'));
        }

    public function todaysAppointment(Request $request){
        $user = DB::table('users')->get();
        $from =$_GET['from'];
        $to = $_GET['to'];
        $dates = DB::table('fandas')->whereBetween('fandas.appointment', [$from, $to])
                ->orderBy('fandas.appointment','asc')
                ->join('phpatients','fandas.Registration','=','phpatients.register')
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                ->select('phpatients.*','fandas.*','phtypes.*','diagnoses.*','referdoctors.*','referhospitals.*','phstatuses.*')
                ->get();
        
        return view('todaysAppointment', compact('dates','user'));
        }
    public function tomorrowsAppointment(Request $request){
        $user = DB::table('users')->get();
        $from =$_GET['from'];
        $to = $_GET['to'];
        $dates = DB::table('fandas')->whereBetween('fandas.appointment', [$from, $to])
                ->orderBy('fandas.appointment','asc')
                ->join('phpatients','fandas.Registration','=','phpatients.register')
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                ->select('phpatients.*','fandas.*','phtypes.*','diagnoses.*','referdoctors.*','referhospitals.*','phstatuses.*')
                ->get();
        
        return view('todaysAppointment', compact('dates','user'));
        }

    public function thisWeeksAppointment(Request $request){
        $user = DB::table('users')->get();
        $from =$_GET['from'];
        $to = $_GET['to'];
        $dates = DB::table('fandas')->whereBetween('fandas.appointment', [$from, $to])
                ->orderBy('fandas.appointment','asc')
                ->join('phpatients','fandas.Registration','=','phpatients.register')
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                ->select('phpatients.*','fandas.*','phtypes.*','diagnoses.*','referdoctors.*','referhospitals.*','phstatuses.*')
                ->get();
        
        return view('todaysAppointment', compact('dates','user'));
        }
    public function nextWeeksAppointment(Request $request){
        $user = DB::table('users')->get();
        $from =$_GET['from'];
        $to = $_GET['to'];
        

            $dates = DB::table('fandas')->whereBetween('fandas.appointment', [$from, $to])
                ->orderBy('fandas.appointment','asc')
                ->join('phpatients','fandas.Registration','=','phpatients.register')
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                ->select('phpatients.*','fandas.*','phtypes.*','diagnoses.*','referdoctors.*','referhospitals.*','phstatuses.*')
                ->get();
        
        return view('todaysAppointment', compact('dates','user'));
        
        }
    public function editAppointment(Request $request){
        $user = DB::table('users')->get();
        $id = $_GET['id'];

        $data = DB::table('fandas')->where(['fandas.id'=>$id])
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->get();
                
        return view('editAppointmentForm',compact('data','user'));
    }
    public function changeStatus(Request $request){
        // echo 'App id : ' . $request->aid . ' Status id : ' . $request->sid;
        
        $data = DB::table('fandas')->where(['id'=>$request->aid])->update(['refer_idSta'=>$request->sid]);
        
    }
}

