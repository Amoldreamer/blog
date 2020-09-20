@extends('layouts.app')

@section('searchPatient')
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
                <td>Appointment Date</td>
                <td>Refer Doctor</td>
                <td>Refer Hospital</td>
                <td>Diagnosis</td>
                <td>Remarks</td>
            </tr>
    @foreach($data as $key=>$value)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$value->register}}</td>
                <td><a href="patientDashboard?num={{$value->register}}">{{$value->customerName}}</a></td>
                <td>{{$value->gender}}</td>
                <td>{{$value->age}}</td>
                <td>{{$value->appointment}}</td>
                <td>{{$value->referDoctors}}</td>
                <td>{{$value->referHospitals}}</td>
                <td>{{$value->diagnosis}}</td>
                <td>{{$value->remarks}}</td>
                <form action="fanda" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$value->id}}" />
                    <input type="hidden" name="register" value="{{$value->register}}" />
                    <input type="hidden" name="name" value="{{$value->customerName}}" />
                <td><input type="submit" name="submit" value="Appointment/Followup" /></td>
                </form>
                <form action="showStatus" method="post">
                        {{csrf_field()}}
                    <input type="hidden" name="register" value="{{$value->register}}" />
                    <td><input type="submit" name="submit" value="View" /></td>
                </form>
            </tr>
    @endforeach
        </table> 
    </body>
    {{ $data->appends(request()->except('page'))->links() }}
@endsection