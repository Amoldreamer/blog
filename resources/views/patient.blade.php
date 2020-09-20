@extends('layouts.app')

@section('patient')

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
            <td>S.No</td>
            <td>Registration</td>
            <td>CustomerName</td>
            <td>Gender</td>
            <td>Age</td>
            <td>Refer Hospital</td>
            <td>Refer Doctor</td>
            <td>Diagnosis</td>
            <td>appointment Date</td>
            <td>Registered Date</td>
            <td>Updatded Date</td>
            <td>Remarks</td>
        </tr>
        @foreach($patients as $key=>$value)
        <form action="insertFollowups" method="GET">
        <tr>
            <td>{{++$i}}</td>
            <td>{{$value->register}}</td>
            <td>{{$value->customerName}}</td>
            <td>{{$value->gender}}</td>
            <td>{{$value->age}}</td>
            <td>@foreach($hos as $key=>$result)
            {{$result->referHospitals}}
                @endforeach
            </td>
            <td>
                @foreach($doc as $key=>$result)
            {{$result->referDoctors}}
                @endforeach
            </td>
            <td>
                @foreach($dia as $key=>$result)
            {{$result->diagnosis}}
                @endforeach
            </td>
            <td>{{$value->appointment}}</td>
            <td>{{$value->created_at}}</td>
            <td>{{$value->updated_at}}</td>
            <td>{{$value->remarks}}</td>
            <input type="hidden" name="id" value={{$value->id}} />
            <td><input type="submit" name="followup" value="Followup" /></td>
        </tr>
        </form>
        @endforeach
    </table>


</body>
@endsection