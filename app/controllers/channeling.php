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
            $data2=NULL;
            $data3=NULL;
            $data4=NULL;

            $data5 = $Auth->finduser();

        

                if ( (isset($_GET['search1'])) ) {
                //side that we put % mark it ignore exact matching
                $search1 = '%' . $_GET['search1'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
                $query1 = "select * from doctors where nameWithInitials like :search1 order by userid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
                $arr1['search1'] = $search1; //to pass to the query function
                $data1 = $doctors->query($query1, $arr1);
                //print_r($data1);
                }

                if ( (isset($_GET['search2'])) ) {

                $search2 = '%' . $_GET['search2'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
                $query2 = "select * from doctors where specialities = :search2 order by userid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
                $arr2['search2'] = $search2; //to pass to the query function
                $data2 = $doctors->query($query2, $arr2);
                //print_r($data2);

                }

                if ( (isset($_GET['search3'])) ) {

                $search3 = '%' . $_GET['search3'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
                $query3 = "select * from doctors where hospital = :search3 order by userid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
                $arr3['search3'] = $search3; //to pass to the query function
                $data3 = $doctors->query($query3, $arr3);
                //print_r($data3);

                }

                if ( (isset($_GET['search4'])) ) {

                $schedule = new schedule;
                $scheduleid = $schedule->where('doctorid',$userid);
                
                if($scheduleid){
                $search4 = '%' . $_GET['search4'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
                $query4 = "select * from schedule where dateofSlot = :search4 order by scheduleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
                $arr4['search4'] = $search4; //to pass to the query function
                $data4 = $schedule->query($query4, $arr4);
                //print_r($data4);
                //die;

                }
                }

            



        

        $this->view("patient/channeling",[
            'rows'=>$data,
            'rows1'=>$data1,
            'rows2'=>$data2,
            'rows3'=>$data3,
            'rows4'=>$data4,
            'rows5'=>$data5,




        ]
    );

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
        //print_r($row4);
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

        $patientCount=1;

        $appointments = new appointments;
        $row5=$appointments->where('scheduleid',$scheduleid);

        if($row5){

            $patientCountrow2 = "select * from appointments where scheduleid =:scheduleid order by appointmentid desc limit 1";
            $arr3['scheduleid']=$row4->scheduleid;

            $patientCountrow3 = $appointments->query($patientCountrow2,$arr3);

            //print_r($appointmentidrow1);
            $patientCount=$patientCountrow3[0]->patientCount;
            //print_r($patientCount);
            $patientCount++;
            //print_r($patientCount);
            
        }

        if ($patientCount<=$noOfPatient){

            $availability = TRUE;
            $appointments = new appointments();
            $arr['doctorid'] = $userid1;
            $arr['doctorName'] = $row->nameWithInitials;
            $arr['patientid'] = Auth::userid();
            $arr['scheduleid'] = $scheduleid;
            $arr['patientName'] = Auth::nameWithInitials();
            $arr['nic'] = $nic;
            $arr['tpNumber'] = Auth::tpNumber();
            $arr['commission'] = $commission;
            $arr['totalPayment'] = $total;
            $arr['date'] =  date("Y-m-d H:i:s");
            $arr['noOfPatients'] =  $noOfPatient;
            $arr['patientCount'] =  $patientCount; 
            $arr['availability'] = $availability;



            $arr['patientName'] = $_POST['patientName'];
            $arr['symptoms'] =$_POST['symptoms'];
            $arr['nic'] = $_POST['nic'];
            $arr['tpNumber'] = $_POST['tpNumber'];

            $appointments->insert($arr);

            
            $appointmentidrow = "select * from appointments where patientid =:patientid order by appointmentid desc limit 1";
            $arr2['patientid']=Auth::userid();

            $appointmentidrow1 = $appointments->query($appointmentidrow,$arr2);

            //print_r($appointmentidrow1);
            $appointmentid=$appointmentidrow1[0]->appointmentid;
            //print_r($appointmentid);

            $arr1['appointmentid'] = $appointmentid;
            $arr1['commission'] = $commission;
            $arr1['doctorCharge'] = $row4->doctorCharge;
            $arr1['totalPayment'] = NULL;
            $arr1['patientName'] = Auth::nameWithInitials();
            $arr1['doctorName'] = $row->nameWithInitials;
            $arr1['date'] =  date("Y-m-d H:i:s");
            $arr1['status'] = "not_completed";


            

        $patientPayment = new patientPayment();
        $patientPayment->insert($arr1);
        $this->redirect('channeling/patientPaymentConfirmation');

        }
        else{

            $availability=FALSE;
            $arr['availability'] = $availability;

            $appointmentidrow = "select * from appointments where patientid =:patientid order by appointmentid desc limit 1";
            $arr2['patientid']=Auth::userid();

            $appointmentidrow1 = $appointments->query($appointmentidrow,$arr2);

            //print_r($appointmentidrow1);
            $appointmentid=$appointmentidrow1[0]->appointmentid;

            $appointments->update($appointmentid,$arr);


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
        
         

        
             
            //$row3=$appointments->where($doctorid,'userid');

            //print_r($row2);
                                            
           
    $this-> view("patient/patient",[
            'row'=>$row,



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
        //$date=$row1[0]->dateOfSlot;

        
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

        $userid = Auth::userid();

        $common_user = new common_user();
        $row=$common_user->where('userid',$userid);
        if($row)
        {
            $row=$row[0];
        }

        $appointments = new appointments;
        $appointmentidrow = "select * from appointments where patientid =:patientid order by appointmentid desc limit 1";
            $arr2['patientid']=Auth::userid();

           

            $appointmentidrow1 = $appointments->query($appointmentidrow,$arr2);
            if($appointmentidrow1)
            {
             $appointmentidrow1=$appointmentidrow1[0];
            }
           
            $this-> view("patient/patientPaymentConfirmation",[
                'row'=>$row,
                'row1'=>$appointmentidrow1,
    
    
            ]);
         //-------------------------------for payment details-----------------------------------------------------
    }

    function patientPaymentConfirmationPayhere(){

         if (count($_POST) > 0) {

         $merchant_id         = $_POST['merchant_id'];
         $order_id             = $_POST['order_id']; //paymentid 
         $payhere_amount     = $_POST['payhere_amount'];
         $payhere_currency    = $_POST['payhere_currency'];
         $status_code         = $_POST['status_code'];
         $md5sig                = $_POST['md5sig'];
 
         print_r($order_id);
         die;
         
         $arr['date'] = date("Y/m/d");
         $arr['totalPayment'] = $payhere_amount;
         $arr['paymentid'] = $order_id;
         $arr['status'] = "completed";
 
         print_r($arr);
         //---------to get the post data to txt file for debuging----------------------------
         $today = date("Y-m-d");
         //file_put_contents("POST_logs/" . $today . ".txt", $arr, FILE_APPEND);
         //---------------------------------------------------------------------------------
 
         $merchant_secret = '4p6oM65yLel8lzSHKYzqtQ4TwgRmoRLvF49dAyBUptlC'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)
 
         $local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));
 
         if (($local_md5sig === $md5sig) and ($status_code == 2)) {
             //TODO: Update your database as payment success
 
             $payments = new patientpayment();
             $payments->update2($order_id, $arr);
             $this->redirect('channeling/confirmation');

         } 
         
        //  else {
        //      $appointments = new appointments();
 
        //      //to get the last entry of the user
        //      $data = $patientpayment->where('paymentid', $order_id);
 
        //      if ($data != null) {
        //          $data = $data[0];
        //          unlink($data->image);
 
        //          $patientpayment->delete($order_id);
        //      }
        //  }
         //------------------------end of the payment part---------------------------------------------------------------
        }
       

    }

    function rate($userid=NULL){

        $doctors = new doctors();
        $row=$doctors->findAll();


        if(count($_POST)>0)
        {
            
            $patientRate = new patientRate();//create the instance of the patientRate in model
            
            $arr['doctorName'] = $_POST['name'];
            $arr['feedback'] = $_POST['feedback'];
            $arr['userid'] =Auth::userid();


            $search1 = '%' .  $_POST['name'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
            $query1 = "select * from doctors where nameWithInitials =:search1 order by userid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
            $arr1['search1'] = $search1; //to pass to the query function
            $data1 = $doctors->query($query1, $arr1);

            $doctorid = $data1[0]->userid;
            $arr['doctorid'] = $userid;
            $arr['date'] = date("Y/m/d");
               
             
               
            $patientRate->insert($arr);
            $this->redirect('home/home');
            
            
        } 

        $this-> view("patient/rate",[
            'row'=>$row,
        ]);

    }

   

}
