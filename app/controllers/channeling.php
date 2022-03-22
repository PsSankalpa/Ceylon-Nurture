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

            $data1=NULL;
            
            if (isset($_GET['search'])) {
                //side that we put % mark it ignore exact matching
                $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
                $query = "select * from doctors where nameWithInitials like :search order by userid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
                $arr['search'] = $search; //to pass to the query function
                $data1 = $doctors->query($query, $arr);
              }
        

        $this->view("patient/channeling",[
            'rows'=>$data,
            'rows1'=>$data1,

        ]
    );


        //in here put the relevent page name and the path
        }
    }

    function payment($userid1=null,$scheduleid=null)
    {
        $doctors = new doctors();
        $row=$doctors->where('userid',$userid1);
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

        
        $schedule = new schedule();

        $row4=$schedule->where('scheduleid', $scheduleid);
        if($row4)
        {
            $row4=$row4[0];
        }

        $doctorCharge = $row4->doctorCharge;
        $commission = 200;
        $total=$doctorCharge + $commission;
        $nic = $row2->nic;
        //print_r($nic);

        if (count($_POST) > 0) {
        $noOfPatient = $row4->noOfPatient;
        
        //$count=0;

        //foreach (count($_POST)>0){
        //    $count+=$count;
        //}

        
        //if ($count<=$noOfPatient){

            $availability = TRUE;
            $appointments = new appointments();
            $arr['doctorid'] = $userid1;
            $arr['doctorName'] = $row4->doctorCharge;
            $arr['patientid'] = Auth::userid();
            $arr['scheduleid'] = $scheduleid;
            $arr['patientName'] = Auth::nameWithInitials();
            $arr['nic'] = $nic;
            $arr['tpNumber'] = Auth::tpNumber();
            $arr['commission'] = $commission;
            $arr['totalPayment'] = $total;
            $arr['date'] =  date("Y-m-d H:i:s");

            $arr['patientName'] = $_POST['patientName'];
            $arr['symptoms'] =$_POST['symptoms'];
            $arr['nic'] = $_POST['nic'];
            $arr['tpNumber'] = $_POST['tpNumber'];
            
        $appointments->insert($arr);
        $this->redirect('channeling/confirmation');

       // }
        else{

            $availability=FALSE;
        }


        }


        $this->view("patient/patientPayment",[
            'row'=>$row,
            'row2'=>$row2,
            'row3'=>$row3,
            'row4'=>$row4,


        ]);

    }

    function patient()
    {
        $appointments= new appointments();
        $Auth = new Auth;

        $userid = Auth::userid();

        $row=$appointments->where('patientid',$userid);

        //print_r($row);
        foreach ($row as $row){

            $doctorid=$row->doctorid;
            $doctors = new doctors();
            $row1=$doctors->where('userid',$doctorid);

            if($row1)
            {
            $row1=$row1[0];
            }

            $scheduleid=$row->scheduleid;
            $schedule = new schedule();
            $row2=$schedule->where('scheduleid',$scheduleid);

            if($row2)
            {
            $row2=$row2[0];
             }
            //$params = array();

            // for($i=0;$i<count($row2);$i++){
            //     $params=$row2[$i];
            // }
            //$params = $row;

        
        //print_r($params);

        
    }
    $this-> view("patient/patient",[
            'row'=>$row,
            'row1'=>$row1,
            'row2'=>$row2,



        ]);
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
        $appointments= new appointments();
        $Auth = new Auth;

        $userid = Auth::userid();

        $row=$appointments->where('patientid',$userid);


        $this-> view("patient/patientAppointments",[
            'row'=>$row,
        ]);

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

    

    function patientPaymentConfirmation()
    {



        $commonuser = new common_user();
        $userid = Auth::userid();
        if (!empty($row = $commonuser->where('userid', $userid))) {
            $row = $row[0];
            $nameWithInitials = $row->nameWithInitials;
        }


        $merchant_id         = $_POST['merchant_id'];
        $order_id             = $_POST['order_id'];
        $payhere_amount     = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig                = $_POST['md5sig'];

        $merchant_secret = '4p6oM65yLel8lzSHKYzqtQ4TwgRmoRLvF49dAyBUptlC'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        $local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));

        if (($local_md5sig === $md5sig) and ($status_code == 2)) {
            //TODO: Update your database as payment success

            $donations = new donations();

            $arr['date'] = date("Y/m/d");
            $arr['amount'] = $_POST['payhere_amount'];
            $arr['userName'] = $nameWithInitials;
            $arr['donationNumber'] = $_POST['order_id'];
            $arr['userID'] = Auth::userid();
            $arr['method'] = $_POST['method'];
            $arr['status_message'] = $_POST['status_message'];
            //add the last two parameters to the table

            $donations->insert($arr);
        }
        
        $this-> view("patient/patientPaymentConfirmation");

    }

   

}
