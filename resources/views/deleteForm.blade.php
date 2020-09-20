@extends('layouts.app')

@section('deleteForm')

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
        <table class="table" style="margin-top:40px;">
            <tr>
                <td>Registration</td>
                <td>CustomerName</td>
                <td>Gender</td>
                <td>Age</td>
                <td>Remarks</td>
                <td>Diagnosis</td>
                <td>ReferDoctor</td>
                <td>ReferHospital</td>
            </tr>
            @foreach($data as $key=>$value)
            <tr>
                <td>{{$value->register}}</td>
                <td>{{$value->customerName}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->age}}</td>
                <td>{{$value->remarks}}</td>
                <td>{{$value->diagnosis}}</td>
                <td>{{$value->referDoctor}}</td>
                <td>{{$value->referHospital}}</td>
                <form action="deletePatient" method="POST">
                    {{csrf_field()}}
                <input type="hidden" name="id" value="{{$value->id}}" />
                <td><input type="submit" name="submit" value="delete" /></td>
                </form>
            </tr>
    @endforeach
        </table>
    
    </body>

@endsection