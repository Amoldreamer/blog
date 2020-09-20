{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')



<!DOCTYPE html>
<html>
    <head>
    
        <style>
            

            body{
                margin: 0;
                padding: 0;
                /* background: url('https://static-communitytable.parade.com/wp-content/uploads/2014/03/rethink-target-heart-rate-number-ftr.jpg') fixed; */
                background-size: cover;  
                background-position: center;
                height:100%;      
            }
            font{
                font-size: 50px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
    </head>
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
        <div style="position:absolute; top:20%;width:1200px; " >
            <div class="col-md-6" style="float:right">
                    <table class="table table-borderless condensed" style="float:left">
                            <tr style="font-weight:500">
                                <td>Diagnosis</td>
                                <td>Frequency</td>
                            </tr>
                            @foreach($result as $key=>$value)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$value}}</td>
                                </tr>
                            @endforeach
                        </table>
    </div>
    <div class="col-md-6">
            <label style="font-weight:500" >Remaining Appointments:</label>
            <table class="table table-borderless" style="float:right">
                <tr>
                    <td>Patient Name</td><td>Appointment Time</td>
                </tr>
                
            @foreach($info as $k=>$v)            
                @if($v->time>$t && $l<=5)
                <tr>
                    <td>{{$v->customerName}} </td><td>{{$v->time}} </td>
                </tr>               
                    <?php $l++; ?>
                @endif
            @endforeach
            </table>
        
    </div>
        </div>

    </body>
</html>