<?php
class appointments extends Controller
{
  function index()
  {
      
    $appointments = new appointments(); 
    if(!Auth::logged_in())  
    {
      $this->redirect('login/login');
    }
        
    else
    {
      $doctors = new doctors();
      $data2 = $doctors->findAll();

      $this->view('doctor/appointments',[ //in here put the relevent page name and the path
			'row'=>$data2,
		  ]);   
    }
  }
  /*function to view appointments
  function viewAppointment($scheduleid = null)
  {
      $errors = array();
      $schedule = new schedule();
      
      $row =$schedule->where('scheduleid',$scheduleid); //in here row is an array
      $data2 = $schedule->findAll();
      
      $this->view('doctor/viewAppointment',[
        'errors'=>$errors,
        'row'=>$row,
        'data2'=>$data2,
  ]);
  }*/
}

