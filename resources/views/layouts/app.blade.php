{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('public/css/style.css')}}" type="text/css" />


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['password'])){ 
    
}else{
    header('location:index.php');
}
?>
        <link rel="stylesheet" href="css/menu.css" />

<style>
    div a{
        text-decoration:none;
        padding:10px;
        margin-top:10px;
        color:white;
        font-size: 20px;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home">Orthopedica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Patient
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="patient">View</a>
          <a class="dropdown-item" href="insertPatientDetails">Register</a>
          <a class="dropdown-item" href="editPatientForm">Update</a>
          <a class="dropdown-item" href="deleteForm">Delete</a>
          <a class="dropdown-item" href="diagnosis">Diagnosis</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Followup
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="patientAppointment">View Followup</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="showDoctors">Show Doctors</a>
          <a class="dropdown-item" href="showHospitals">Show Hospitals</a>
          <a class="dropdown-item" href="showDiagnosis">Show Diagnosis</a>
          <a class="dropdown-item" href="insertDoctors">Insert Doctors</a>
          <a class="dropdown-item" href="insertHospitals">Insert Hospitals</a>
          <a class="dropdown-item" href="insertDiagnosis">Insert Diagnosis</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Appointments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
                $f = date('Y-m-d');
                $to = date('Y-m-d');
                $t = date('Y-m-d', strtotime($to. ' + 1 days'));
                $tomfrom = date('Y-m-d', strtotime($f. ' + 1 days'));
                $tomto = date('Y-m-d', strtotime($to. ' + 2 days'));
                $thwapp = date('Y-m-d', strtotime($to. ' + 8 days'));
                $nxtwfrom = date('Y-m-d', strtotime($f. ' + 8 days'));
                $nxtwto = date('Y-m-d', strtotime($to. ' + 15 days'));
            ?>
          <a class="dropdown-item" href="todaysAppointment?from=<?php echo $f; ?>&to=<?php echo $to; ?>">Today's Appointment</a>
          <a class="dropdown-item" href="tomorrowsAppointment?from=<?php echo $tomfrom; ?>&to=<?php echo $tomfrom; ?>">Tomorrow's Appointment</a>
          <a class="dropdown-item" href="thisWeeksAppointment?from=<?php echo $f; ?>&to=<?php echo $thwapp; ?>">This Week's Appointment</a>
          <a class="dropdown-item" href="nextWeeksAppointment?from=<?php echo $nxtwfrom; ?>&to=<?php echo $nxtwto; ?>">Next Week's Appointment</a>
          <a class="dropdown-item" href="appointmentList">Appointment List</a>
      </li>
    </ul>
    <form action="searchPatient" method="get" class="form-inline my-2 my-lg-0">
        {{csrf_field()}}
        <select type = "text" name="choice" class="mdb-select md-form colorful-select dropdown-primary" style="width: 200px; height: 38px; padding:6px; border-radius:4px">
            <option>Name</option>
            <option>Registration Number</option>
        </select>&nbsp&nbsp&nbsp
      <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <div id="match-list"></div>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <script src="public/js/main.js"></script>
  </div>
</nav>
@section('patient')
@show
@section('insertPatientDetails')
@show
@section('editPatient')
@show
@section('updateMessage')
@show
@section('deleteForm')
@show
@section('deleteMessage')
@show
@section('insertMessage')
@show
@section('insertPatientAppointments')
@show
@section('insertAppointments')
@show
@section('patientAppointment')
@show
@section('editPatientAppointments')
@show
@section('appointmentUpdateMessage')
@show
@section('deleteAppointments')
@show
@section('deleteAppointmentsMessage')
@show
@section('searchPatient')
@show
@section('insertDoctorMessage')
@show
@section('doctorForm')
@show
@section('hospitalsForm')
@show
@section('hospitalMessage')
@show
@section('diagnosisForm')
@show
@section('diagnosisMessage')
@show
@section('fanda')
@show
@section('fandaMessage')
@show
@section('appointmentList')
@show
@section('viewAppointment')
@show
@section('todaysAppointment')
@show
@section('patientDashboard')
@show
@section('showDoctors')
@show
@section('editDoctor')
@show
@section('showHospitals')
@show 
@section('hospital')
@show
@section('editHospital')
@show
@section('showDiagnosis')
@show
@section('diagnosis')
@show
@section('editDiagnosis')
@show
@section('dashboardMessage')
@show
@section('signup')
@show
@section('content')
@show