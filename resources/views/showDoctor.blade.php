@extends('layouts.app')

@section('showDoctors')
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
            <td>Doctors</td>
        </tr>
        @foreach($info as $key=>$value)
        <tr>
            <td>{{$value->referDoctors}}</td>
            <td><a href="editDoctor?id={{$value->id}}"><input type="submit" name="edit" value="Edit" /></a></td>
            <td><a href="deleteDoctor?id={{$value->id}}"><input type="submit" name="delete" value="Delete" /></a></td>
        </tr>
        @endforeach
    </table>
@endsection