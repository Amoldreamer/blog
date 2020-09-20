@extends('layouts.app')

@section('viewAppointment')
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
    <table class="table" style="margin-top:40px;">
        <tr>
            <td>Registration</td>
            <td>Customer Name</td>
            <td>Gender</td>
            <td>Age</td>
            <td>Refer Doctor</td>
            <td>Refer Hospital</td>
            <td>Diagnosis</td>
            <td>Reg. Remarks</td>
            <td>Appt./FL.up</td>
            <td>Time</td>
            <td>Status</td>
            <td>Appt. Remarks</td>
        </tr>
        @foreach($dates as $date)
            <tr>
                <td>{{$date->register}}</td>
                <td><a href="patientDashboard?num={{$date->register}}">{{$date->customerName}}</a></td>
                <td>{{$date->gender}}</td>
                <td>{{$date->age}}</td>
                <td>{{$date->referDoctors}}</td>
                <td>{{$date->referHospitals}}</td>
                <td>{{$date->diagnosis}}</td>
                <td>{{$date->remarks}}</td> 
                <td>{{$date->types}}</td> 
                <td>{{$date->appointment}}</td>
                <td>{{$date->refer_idSta}}</td>
                <td>{{$date->remarks}}</td>
            </tr>
        @endforeach
    </table>
@endsection