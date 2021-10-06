<?php
class patient extends Controller
{
    function index()
    {
      
       $patient = new patient();
        //$data = $common_user->findAll();

        $this->view("patient/patient"); //in here put the relevent page name and the path
    }

  
}
