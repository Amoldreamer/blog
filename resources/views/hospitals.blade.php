@extends('layouts.app')

@section('hospitalsForm')
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
        @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
    <table class="table" style="margin-top:40px;">
        <tr>
            
        </tr>
        <form action='insertHospitalDetails' method="post">
            {{csrf_field()}}
            <tr>
                <td>Refer Hospital</td>
                <td><input type="text" name="referHospital" /></td>
                <td><input type="submit" name="insertHospital" value="insert" /></td>
            </tr>
        </form>
    </table>

</body>
@endsection