@extends('layouts.app')

@section('deleteAppointments')

@foreach($user as $key=>$value)
        <div style="position:absolute; top: 12%;">
                {{ Auth::user()->name }} 
            <a style="color:black; text-decoration:none;font-size:15px;" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">(
         {{ __('Logout') }}
                      )</a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form>
        </div>
        @endforeach
        
            <table class="table" style="margin-top:30px;">
                    <tr>
                        <td>S.No</td>
                        <td>PatientId</td>
                        <td>Appointment</td>
                        <td>NepaliAppo</td>
                        <td>Remarks</td>
                    </tr>
                    @foreach($data as $key=>$value)
                    <form action="deletePatientAppointments" method="POST">
                        {{csrf_field()}}
                        <tr>
                            <td>{{++$i}}</td>
                            <td><input type="text" name="pid" value={{$value->patientId}} /></td>
                            <td><input type="date" name="appointment" value={{$value->Appointment}} /></td>
                            <td><input type="text" name="nepaliAppo" value={{$value->nepaliAppo}} /></td>
                            <td><input type="text" name="remarks" value={{$value->Remarks}} /></td>
                            <input type="hidden" name="id" value={{$value->id}} />
                            <td><input type="submit" name="submit" value="delete" /></td>
                        </tr>
                    </form>
                    @endforeach
                
            </table
                
            
            @endsection