@extends('layouts/app')

@section('patientAppointment')

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
            <td>Customer Name</td>
            <td>Followup</td>
            <td>NepaliAppo</td>
            <td>Remarks</td>
        </tr>
        @foreach($data as $key=>$value)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$value->registration}}</td>
            <td>{{$value->customerName}}</td>
            <td>{{$value->Followup}}</td>
            <td>{{$value->nepaliAppo}}</td>
            <td>{{$value->Remarks}}</td>
            <form action="editAppointmentForm" method="POST" >
                {{csrf_field()}}
                <input type="hidden" name="id" value={{$value->id}} />
                <td><input type="submit" name="edit" value="Edit" /></td>
            </form>
            <form action="deleteAppointmentForm" method="POST" >
                {{csrf_field()}}
                <input type="hidden" name="id" value={{$value->id}} />
                <td><input type="submit" name="edit" value="Delete" /></td>
            </form>
        </tr>
        @endforeach
    </table>
</body>
@endsection