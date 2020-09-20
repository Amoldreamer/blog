<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use app\Phpatient;
use Storage;

class PatientController extends Controller
{
    public function patient(){
        $user = DB::table('users')->get();
        $patients = DB::table('phpatients')->get();
        $i = 0;
        foreach($patients as $parent=>$child){
            $doc = DB::table('referdoctors')->where(['id'=>$child->refer_idDoc])->get();
            $hos = DB::table('referhospitals')->where(['id'=>$child->refer_idHos])->get();
            $dia = DB::table('diagnoses')->where(['id'=>$child->refer_idDia])->get();
        }
        return view('patient',compact('patients', 'i','doc','hos','dia','user'));
}

    public function insertPatientDetails(){
        $user = DB::table('users')->get();
        $data = DB::table('phpatients')->get();
        $diagnosis = DB::table('diagnoses')->get();
        $referDoctor = DB::table('referdoctors')->get();
        $referHospital = DB::table('referhospitals')->get();
        if ($data->isEmpty()) {
            $registration = 101;
         }else{
                $data = DB::table('phpatients')->orderBy('created_at','DESC')->first();
                $registration = $data->register;
                $registration++;
         }                    
        
        return view('insertPatientDetails',compact('registration','diagnosis','referDoctor','referHospital','user'));
    }
    public function insertPatient(Request $request){
        // if(file_exists(public_path('json/names.json'))){
        //     $current_data = file_get_contents('json/names.json');
        //     $array_data = json_decode($current_data,true);
        //     $extra = array(
        //         'name'  => $request->customerName
        //     );
        //     $array_data[] = $extra;
        //     $final_data = json_encode($array_data);
        //     file_put_contents('json/names.json', $final_data);
        // }else{
        //     dd('File is not exists.');
        // }
        $user = DB::table('users')->get();
        $Validator = Validator::make($request->all(),[
            "customerName"=>"required|unique:phpatients"
        ],[
            "customerName.required"=>$request->customerName. "already exists in the database"
        ]);
        if($Validator->fails()){
            return redirect("insertPatientDetails")->withErrors($Validator);
        }else{
            if($request->appointmentDate !=""){
                DB::table('fandas')->insert(["Registration"=>$request->registration,"appointment"=>$request->appointmentDate,"time"=>$request->appointmentTime,
                 "refer_idType"=>"1","refer_idSta"=>"1","remarks"=>$request->remarks]);
            }
            $data = DB::table('phpatients')->insert(
                ["customerName"=>$request->customerName, "gender"=>$request->gender, "age"=>$request->age,
                "remarks"=>$request->remarks, "refer_idDoc"=>$request->referDoctor, "refer_idHos"=>$request->referHospital,
                "refer_idDia"=>$request->diagnosis,"appointment"=>$request->appointmentDate,"time"=>$request->appointmentTime, "register"=>$request->registration]
            );
        }
        if($data){
            $patients = DB::table('phpatients')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->where('phpatients.customerName','LIKE','%'.$request->customerName. '%')
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->get();
            return view('insertMessage', compact('patients','user'));
        }
        else{
            $inserted = "Row could not be inserted";
            return view('insertMessage', compact('inserted','user'));
        }
    }
    public function editPatient(Request $request)
    {   
        $user = DB::table('users')->get();
        $register=$_GET['num'];
        $data = DB::table('phpatients')->where(['register'=>$register])->get();
        $diagnosis = DB::table('diagnoses')->get();
        $referDoctor = DB::table('referdoctors')->get();
        $referHospital = DB::table('referhospitals')->get();
        
        
        return view('editPatient',compact('data','diagnosis','referDoctor','referHospital','user'));
    }
    public function deleteForm(){
        $user = DB::table('users')->get();
        $data = DB::table('phpatients')->get();
        return view('deleteForm',compact('data','user'));
    }

    public function deletePatient(Request $request){
        $user = DB::table('users')->get();
        $data = DB::table('phpatients')->where(["id"=>$request->id])->delete();
            $deleted = "Row has been deleted";
            return view("deleteMessage", compact("deleted",'user'));
        }

   
    public function searchPatient(Request $request){
        $user = DB::table('users')->get();
        if($request->choice == 'Name'){        
        $data = DB::table('phpatients')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->where('phpatients.customerName','LIKE','%'.$request->search. '%')
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->paginate(10);
        }
        elseif($request->choice == 'Registration Number'){
                $data = DB::table('phpatients')
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')
                ->where('phpatients.register','LIKE','%'.$request->search. '%')
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->paginate(10);
    }
        return view('searchPatient', compact('data','user'));
}

    public function editPatients(Request $request){
        $user = DB::table('users')->get();
        
        DB::table('phpatients')->where(["register"=>$request->registration])->update(
            ["customerName"=>$request->customerName, "gender"=>$request->gender, "age"=>$request->age,
            "remarks"=>$request->remarks, "refer_idDoc"=>$request->referDoctor, "refer_idHos"=>$request->referHospital,
            "refer_idDia"=>$request->diagnosis, "register"=>$request->registration]);
            $data = DB::table('phpatients')
            ->where(["register"=>$request->registration])
                    ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                    ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                    ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')              
                    ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                    ->get();
    
            //getting appointment history
            $appHis = DB::table('fandas')
            ->where(["Registration"=>$request->registration])
                    ->orderBy('fandas.created_at','desc')
                    ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                    ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                    ->select('fandas.*','phtypes.*','phstatuses.*')
                    ->get();

            //getting last item of fandas
            $lastItem = DB::table('fandas')->where('Registration',[$request->registration])->orderBy("created_at","desc")->first();

            $item = DB::table('fandas')
                    ->where('fandas.id',[$lastItem->id])
                    ->whereNotIn('fandas.id', [$lastItem->id])
                    ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                    ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                    ->select('fandas.*','phtypes.*','phstatuses.*')
                    ->get();

            $status = DB::table('phstatuses')->get();
    
            return view('patientDashboard',compact('data','appHis','item','lastItem','status','user'));
    }

    public function patientDashboard(Request $request){
        $user = DB::table('users')->get();
        global $refer;
        global $appointment;

        if(isset($_GET['submit'])){
        $appointmentDate = $_GET['appointmentDate'];
        $appointment = $_GET['appointment'];
        $remarks = $_GET['remarks'];
        $time = $_GET['time'];
        $register = $_GET['register'];
        }
        else{
            //getting the registration number
            $register = $_GET['num'];
        }
        
        $data = DB::table('phpatients')
        ->where(['register'=>$register])
                ->join('referdoctors','phpatients.refer_idDoc','=','referdoctors.id')
                ->join('referhospitals','phpatients.refer_idHos','=','referhospitals.id')
                ->join('diagnoses','phpatients.refer_idDia','=','diagnoses.id')              
                ->select('phpatients.*','referdoctors.referDoctors','referhospitals.referHospitals','diagnoses.diagnosis')
                ->get();

        if($appointment == 'Appointment'){
            $refer = 1;
        }
        elseif($appointment == 'Followup'){
            $refer = 2;
        }

        //getting last item of fandas
        $lastItem = DB::table('fandas')->where('Registration',[$register])->orderBy("created_at","desc")->first();
        
        //insert into table fandas
        if($refer){
        DB::table('fandas')->insert(["Registration"=>$register,"appointment"=>$appointmentDate,"time"=>$time,"refer_idType"=>$refer,"refer_idSta"=>$lastItem->refer_idSta,"remarks"=>$remarks]);
        }

        //getting last item of fandas
        $lastItem = DB::table('fandas')->where('Registration',[$register])->orderBy("created_at","desc")->first();
        

        //getting appointment history
        $appHis = DB::table('fandas')
                ->where('Registration',[$register])
                ->whereNotIn('fandas.id', [$lastItem->id])
                ->orderBy('fandas.created_at','desc')
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                ->select('fandas.*','phtypes.*','phstatuses.*')
                ->get();

                // foreach($appHis as $key=>$value){
                //     echo $value->appointment.'<br>';
                //     echo $value->id.'<br>';
                // }die();

        $item = DB::table('fandas')
        ->where('fandas.id',[$lastItem->id])
                ->join('phtypes','fandas.refer_idType','=','phtypes.id')
                ->join('phstatuses','fandas.refer_idSta','=','phstatuses.id')
                ->select('fandas.*','phtypes.*','phstatuses.*')
                ->get();
                //     foreach($item as $key=>$value){
                //     echo $value->appointment.'<br>';
                //     echo $value->id.'<br>';
                // }die();


        $status = DB::table('phstatuses')->get();

        return view('patientDashboard',compact('data','appHis','item','lastItem','status','user'));
    }

    public function showDoctors(Request $request){
        $user = DB::table('users')->get();
        $info = DB::table('referdoctors')->get();

        return view('showDoctor',compact('info','user'));
    }
}



