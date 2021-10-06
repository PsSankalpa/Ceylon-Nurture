<?php
class channeling extends Controller
{
    function index()
    {
      
       $channeling = new channeling();
        //$data = $common_user->findAll();

        $this->view("patient/channeling"); //in here put the relevent page name and the path
    }
}