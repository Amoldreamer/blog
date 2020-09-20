@extends('layouts.app')

@section('appointmentList')
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
    
    <div style="margin-top:30px;">
            Insert date ranges:<br><br>
    <form action = "viewAppointment" method="get">
        {{csrf_field()}}
        <table>
            <tr>
                Start date:
                <input type="date" name="from" />
            </tr><br><br>
            <tr>
                End date:
                <input type="date" name="to" />
            </tr>
        </table>
        <input type="submit" name="submit" />
    </form>
@endsection