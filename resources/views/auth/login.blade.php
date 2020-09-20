{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<?php
// include 'dbclass.php';

// $db = new dbclass;
global $error;
global $wPass;
?>

<?php
    if(isset($_POST['submit'])){
        if($_POST['email']!="" || $_POST['password']!=""){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $username=$_POST['username'];
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['username']=$username;

        $db->verifyPassword($password);
        }
        else{
            $error="The email and password must be filled";
        }
        
    }
?>

<!DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css" />

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container-fluid bg">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12"></div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <form action="{{ route('login') }}" method="POST" class="form-container">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" name="password">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                                <label style="margin-left:-100px; margin-top:15px; font-size:15px;">
                            <?php echo $error;
                                echo $wPass;
                            ?>        
                        </label>
                            </form>
                        </div>
                </div>
            </div>
        </body>
    </html>
