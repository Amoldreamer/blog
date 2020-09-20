@extends('layouts.app')

@section('fandaMessage')
<body>
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
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%)">
        @foreach($patient as $key=>$value)
           <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"> <strong>Registration</strong>&nbsp&nbsp&nbsp&nbsp {{$value->Registration}}</div><br>
            
            <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Patient Name</strong>&nbsp&nbsp&nbsp&nbsp {{$value->customerName}}</div><br>
                                
                                <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Appointment Date </strong>&nbsp&nbsp&nbsp&nbsp {{$value->appointment}}</div><br>
                                <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Type</strong>&nbsp&nbsp&nbsp&nbsp {{$value->types}}</div><br>
                                <div style="background-color:rgb(61, 229, 221); padding: 8px;border-radius: 6px;"><strong>Remarks</strong>&nbsp&nbsp&nbsp&nbsp {{$value->appRemarks}}</div><br>
            @endforeach
    </div>
 </body>
@endsection