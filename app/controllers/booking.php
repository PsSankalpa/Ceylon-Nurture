<?php
class booking extends Controller
{
    function index()
    {
      

        $this->view("patient/booking"); //in here put the relevent page name and the path
    }

    function payment()
    {

        $this-> view("patient/payment");
    }
}