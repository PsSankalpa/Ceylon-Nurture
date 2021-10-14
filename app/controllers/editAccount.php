<?php
class editAccount extends Controller
{
    function index()
    {
      
       $doctors = new doctors();

        $this->view("doctor/editAccount"); //in here put the relevent page name and the path
    }
}