<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('patient', 'PatientController@patient');

Route::get('diagnosis', 'PatientController@diagnosis');

Route::get('insertPatientDetails', 'PatientController@insertPatientDetails');

Route::get('insertPatient', 'PatientController@insertPatient');

Route::get('editPatient', 'PatientController@editPatient');

Route::post('editPatients', 'PatientController@editPatients');

Route::get('deleteForm', 'PatientController@deleteForm');

Route::post('deletePatient', 'PatientController@deletePatient');

Route::get('patientAppointment', 'AppointmentController@patientAppointment');

Route::get('insertFollowups', 'AppointmentController@insertFollowups');

Route::POST('editPatientAppointments', 'AppointmentController@editPatientAppointments');

Route::get('deleteAppointments', 'AppointmentController@deleteAppointments');

Route::post('insertPatientFollowups', 'AppointmentController@insertPatientFollowups');

Route::post('editAppointments', 'AppointmentController@editAppointments');

Route::post('deletePatientAppointments', 'AppointmentController@deletePatientAppointments');

Route::get('searchPatient', 'PatientController@searchPatient');

Route::post('editAppointmentForm', 'AppointmentController@editAppointmentForm');

Route::post('deleteAppointmentForm', 'AppointmentController@deleteAppointmentForm');

Route::resource('insertDoctors', 'DoctorsController');

Route::resource('insertDoctorDetails', 'DoctorsController');



Route::resource('diagnosis', 'DiagnosisController');

Route::resource('insertDiagnosisDetails', 'DiagnosisController');

Route::post('fanda','AppointmentController@fanda');

Route::post('fillFanda','AppointmentController@fillFanda');

Route::post('showStatus','AppointmentController@showStatus');

Route::get('appointmentList','AppointmentController@appointmentList');

Route::get('viewAppointment','AppointmentController@viewAppointment');

Route::get('todaysAppointment','AppointmentController@todaysAppointment');

Route::get('tomorrowsAppointment','AppointmentController@tomorrowsAppointment');

Route::get('thisWeeksAppointment','AppointmentController@thisWeeksAppointment');

Route::get('nextWeeksAppointment','AppointmentController@nextWeeksAppointment');

Route::get('patientDashboard','PatientController@patientDashboard');

Route::GET('changeStatus','AppointmentController@changeStatus');

Route::GET('editAppointment','AppointmentController@editAppointment');

Route::get('patientDashboard','PatientController@patientDashboard');

Route::get('deleteDoctor','DoctorsController@destroy');

Route::get('showDoctors','PatientController@showDoctors');

Route::get('editDoctor','DoctorsController@edit');

Route::post('editDoctorFinal','DoctorsController@update');

Route::get('insertHospitals','HospitalController@index');

Route::post('insertHospitalDetails','HospitalController@insertHospitalDetails');

Route::get('showHospitals','HospitalController@showHospitals');

Route::get('editHospital','HospitalController@editHospital');

Route::post('editHospitalFinal','HospitalController@editHospitalFinal');

Route::get('deleteHospital','HospitalController@deleteHospital');

Route::get('showDiagnosis','DiagnosisController@showDiagnosis');

Route::get('insertDiagnosis','DiagnosisController@insertDiagnosis');

Route::post('insertDiagnosisDetails','DiagnosisController@insertDiagnosisDetails');

Route::get('editDiagnosis','DiagnosisController@editDiagnosis');

Route::post('editDiagnosisFinal','DiagnosisController@editDiagnosisFinal');

Route::get('deleteDiagnosis','DiagnosisController@deleteDiagnosis');

Route::get('signup',function(){
    return view('signup');
});

Route::post('signup_register','Auth\RegisterController@create');