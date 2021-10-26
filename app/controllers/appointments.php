<?php
class appointments extends Controller
{
  function index()
  {
    $doctors = new doctors();

    $doctorid = Auth::userid();
    $data =$doctors->where('userid',$doctorid);   
    $this->view('doctor/appointments',[
      'data'=>$data,
    ]); 
  }

}

