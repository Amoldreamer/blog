@extends('layouts.app')

@section('patientDashboard')
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

@foreach($data as $key=>$value)
<?php global $appointment_id ?>
    <h1 style="margin-top:40px;">Patient</h1>
    
    <table class="table" style="margin-top:40px;">
            
        <tr>
            <td>Registration No</td>
            <td>{{ $value->register }}</td>
        </tr>
        <tr>
            <td>Patient Name</td>
            <td>{{$value->customerName}}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{$value->gender}}</td>
        </tr>
        <tr>
            <td>Age</td>
            <td>{{$value->age}}</td>
        </tr>
        <tr>
            <td>Refer Doctor</td>
            <td>{{$value->referDoctors}}</td>
        </tr>
        <tr>
            <td>Hospital</td>
            <td>{{$value->referHospitals}}</td>
        </tr>
        <tr>
            <td>Diagnosis</td>
            <td>{{$value->diagnosis}}</td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td>{{$value->remarks}}</td>
        </tr>
        
    </table>
    <button style="margin-left:670px;"><a href="editPatient?num={{$value->register}}">Edit</a></button>
    @endforeach
    <h1>Appointment History</h1>
    <table class="table">
            <tr>
                <td>Date</td>
                <td>Type</td>
                <td>Remarks</td>
                <td>Status</td>
            </tr>
    
    @foreach($item as $key=>$value)
    <tr>
        <td>{{$value->appointment}}</td>
        <td>{{$value->types}}</td>
        <td>{{$value->remarks}}</td>
        <input type="hidden" value={{$appointment_id =$lastItem->id}} />
        <td>
            <select class="state" name="selectstatus">
            <option>{{$value->status}}</option>
    @foreach($status as $stat=>$sta)
                <option value="{{$sta->id}}">{{$sta->status}}</option>
    @endforeach
            </select>
        </td>
        @endforeach
        <td>
            <button ><a href="editAppointment?id={{$lastItem->id}}">Edit</a></button>
        </td>
    </tr>
    @foreach($appHis as $key=>$value)
            <tr>
                <td>{{$value->appointment}}</td>
                <td>{{$value->types}}</td>
                <td>{{$value->remarks}}</td>
                <td>{{$value->status}}</td>
            </tr>
            @endforeach
    
    </table>
    
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
   $(document).ready(function(){
       $('select[name="selectstatus"]').on('change',function(){
           var sid = $('select[name="selectstatus"]').val();
        
        
           $.ajax({
               method: "GET",
               url: 'changeStatus', 
               data: {
                sid: sid,
                aid: {{$appointment_id}} 
            }
           });
       });
   });
    
</script>
@endsection