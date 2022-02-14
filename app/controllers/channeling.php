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

            $doctors = new doctors();
            //$common_user = new common_user();
               
            $data=$doctors->findAll();
            //$data2=$common_user->where('userid',$userid);

        

        $this->view("patient/channeling",[
            'rows'=>$data,
            //'rows2'=>$data2

        ]
    );


        //in here put the relevent page name and the path
        }
    }

    function payment($userid=null)
    {
        $doctors = new doctors();
        $row=$doctors->where('userid',$userid);
        if($row)
        {
            $row=$row[0];
        }

        $patients=new patients();
        $Auth = new Auth;
        $userid = Auth::userid();
        $row2=$patients->where('userid',$userid);
        if($row2)
        {
            $row2=$row2[0];
        }

        $common_user=new common_user();
        $Auth = new Auth;
        $userid = Auth::userid();
        $row3=$common_user->where('userid',$userid);
        if($row3)
        {
            $row3=$row3[0];
        }


        $this->view("patient/patientPayment",[
            'row'=>$row,
            'row2'=>$row2,
            'row3'=>$row3,

        ]);

    }

    function patient()
    {
        $this-> view("patient/patient");
    }

    function doctors($userid=null)
    {
        
        $doctors = new doctors();
        $row=$doctors->where('userid',$userid);
        if($row)
        {
            $row=$row[0];
        }

        $schedule = new schedule();

        $row1=$schedule->where('doctorid', $userid);
        
       

        $this->view("patient/doctors",[
            'row'=>$row,
            'rows'=>$row1,

        ]);
    }

    function appointments($userid=null)
    {
        $this-> view("patient/patientAppointments");

    }

    function payments()
    {

        $this-> view("patient/patientPayments");

    }

    function reports()
    {

        $this-> view("patient/patientReports");

    }

    function confirmation()
    {

        $this-> view("patient/channelingConfirmation");

    }

}
