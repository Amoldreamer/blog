<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use app\Phpatient;
use Storage;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->get();
        return view('doctors',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = DB::table('users')->get();
        $data = DB::table('referdoctors')->insert(
            ["referDoctors"=>$request->referDoctor]
        );
        if($data){
            $info = DB::table('referdoctors')->get();
        }
        
        return view('showDoctor',compact('info','user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'hello';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = DB::table('users')->get();
        $data = DB::table('referdoctors')->where(['id'=>$request->id])->get();
        return view('editDoctor',compact('data','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = DB::table('users')->get();
        DB::table('referdoctors')->where(['id'=>$request->id])->update(['referDoctors'=>$request->referDoctor]);

        $info = DB::table('referdoctors')->get();
        return view('showDoctor',compact('info','user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = DB::table('users')->get();
        DB::table('referdoctors')->where(['id'=>$request->id])->delete();

        $info = DB::table('referdoctors')->get();
        
        return view('showDoctor',compact('info','user'));
    }
}
