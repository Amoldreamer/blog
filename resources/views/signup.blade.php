@extends('layouts.app')

@section('signup')
    <table class="table table-borderless">
        <form action="signup_register" method="POST">
            {{csrf_field()}}
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>Confirm_password</td>
                <td><input type="password" name="confirm_password" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="register" /></td>
            </tr>
        </form>
    </table>
@endsection