<?php
class booking extends Controller
{
    function index($userid=null)
    {
        $doctors = new doctors();
        $common_user = new common_user();
               
        $data=$doctors->findAll();
        $data2=$common_user->where('userid',$userid);

        

        $this->view("patient/booking",[
            'rows'=>$data,
            'rows2'=>$data2

        ]
    ); //in here put the relevent page name and the path
    }

    function payment()
    {

        $this-> view("patient/payment");
    }
}