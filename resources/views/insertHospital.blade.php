@extends('layouts.app')

@section('hospital')
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
        <form action="insertHospitalDetails" method="POST">
            {{csrf_field()}}
        <tr>
            <td>Hospitals</td><td><input type="text" name="hospitals" /></td>
            <td><input type="submit" name="submit" value="insert" /></td>
        </tr>    
    </form>    
    </table>
@endsection