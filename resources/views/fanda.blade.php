@extends('layouts.app')

@section('fanda')
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
            <form action="fillFanda" method="post">
                {{csrf_field()}}
                <tr>
                    <td>Registration</td>
                    <td>{{$register}}</td>
                </tr>
                <tr>
                    <td>Appointment/Followup Datetime</td>                    
                    <td><input type="datetime-local" name="appointment" /></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>
                        <select type="text" name="fanda">
                            @foreach($types as $key=>$value)
                                <option value="{{$value->id}}">{{$value->types}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td>
                        <textarea type="text" name="remarks"></textarea>
                    </td>
                    <input type="hidden" name="register" value={{$register}} />
                    <input type="hidden" name="name" value={{$name}} />
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="insert" /></td>
                </tr>
            </form>
        </table>
    </body>
@endsection