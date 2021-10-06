<?php
class booking extends Controller
{
    function index()
    {
      
       $booking = new booking();

        $this->view("patient/booking"); //in here put the relevent page name and the path
    }
}