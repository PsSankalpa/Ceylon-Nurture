<?php
class appointments extends Controller
{
  function index()
  {
    $doctors = new doctors();
    
    $this->view('doctor/appointments');  //in here put the relevent page name and the path
  }

  /*function to view appointments
  function viewAppointments()
  {  
    $doctors = new doctors();

    $this->view("doctor/viewAppointments");
  }*/

  //function to view appointments Details
  function appointmentDetails()
  {   
    $doctors = new doctors();

    $this->view("doctor/appointmentDetails");
  }

}

