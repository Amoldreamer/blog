@extends('layouts.app')

@section('editPatientAppointments')
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
<form action="patientDashboard" method="GET">
    {{CSRF_FIELD()}}
    <table class="table" style="margin-top:40px;">
        <tr>
            <td>Date</td>
            <td><input name="appointmentDate" value={{$value->appointment}} /></td>
        </tr>
        <tr>
            <td>Time</td>
            <td><input name="time" value={{$value->time}} /></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
                <select name="appointment">
                    <option>Appointment</option>
                    <option>Followup</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Remarks</td>
            <td><textarea type="text" name="remarks" >{{$value->remarks}} </textarea></td>
        </tr>
    </table>
    <input type="hidden" name="register" value={{$value->Registration}} />
    <input type="submit" name="submit" value="Done" />
</form>
@endforeach
@endsection