<?php
class channeling extends Controller
{
    function index()
    {
      
       $channeling = new channeling();
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $Auth = new Auth;
        $patients = new patients;
        $data = $Auth->finduser();
        $userid = Auth::userid();
        $data = $patients->where('userid',$userid); 

        if(!$data){

            $this->view('patient/errorpage');

        }
        else{


        $this->view("patient/channeling"); //in here put the relevent page name and the path
        }
    }
}
