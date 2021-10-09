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
        
        else{
        $this->view("doctor/appointments"); //in here put the relevent page name and the path
        }
    }
}
