@extends('layouts.app')

@section('editDiagnosis')
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
        @foreach($data as $key=>$value)
        <form action="editDiagnosisFinal" method="POST" >
            {{csrf_field()}}
        <tr>
            <td>Refer Doctor</td>
            <td><input type="text" name="diagnosis" value="{{$value->diagnosis}}" /></td>
            <td><input type="submit" name="submit" value="Edit" /></td>
            <input type="hidden" name="id" value="{{$value->id}}" />
        </tr>
    </form>
    @endforeach
    </table>
@endsection