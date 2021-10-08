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
        else{
        $this->view("patient/channeling"); //in here put the relevent page name and the path
        }
    }
}
