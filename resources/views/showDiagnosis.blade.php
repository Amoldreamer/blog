@extends('layouts.app')

@section('showDiagnosis')
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
            <td>Diagnosis</td>
        </tr>
        @foreach($info as $key=>$value)
        <tr>
            <td>{{$value->diagnosis}}</td>
            <td><a href="editDiagnosis?id={{$value->id}}" ><input type="submit" name="edit" value="Edit" /></a></td>
            <td><a href="deleteDiagnosis?id={{$value->id}}" ><input type="submit" name="delete" value="Delete" /></a></td>
        </tr>
        @endforeach
    </table>
@endsection