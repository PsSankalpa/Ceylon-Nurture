<?php

class header extends Controller
{
    function index()
    {
        $seller = new sellers();
        $doctor = new doctors();
        $patient = new patients();
        $userid = Auth::userid();

        //sellerid
        if(!empty($row = $seller->where('userid',$userid) ))
        {
           $row = $row[0];
           $sellerid = $row->userid;
        }
        else{
           $sellerid = "";
        }

        //dotctorid
        if(!empty($row2 = $doctor->where('userid',$userid) ))
        {
           $row2 = $row2[0];
           $doctorid = $row2->userid;
        }
        else{
           $doctorid = "";
        }

        //patientid
        if(!empty($row3 = $patient->where('userid',$userid) ))
        {
           $row3 = $row3[0];
           $patientid = $row3->userid;
        }
        else{
           $patientid = "";
        }
        
        $data ="none";
        $Auth = new Auth;
        $data = $Auth->finduser($sellerid,$doctorid,$patientid,$userid);
    }
    
    function viewPoducts()
    {
      
        $products = new products();
        $data =$products->findAll(); 


        $this->view('commonUser/ProductsView',['rows'=>$data]);
       
    }
}

?>