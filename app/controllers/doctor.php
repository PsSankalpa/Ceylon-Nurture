<?php
class doctor extends Controller
{
    function index()
    {

        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $Auth = new Auth;
        $data2 = $Auth->finduser();

        $schedule = new schedule();
        $userid = Auth::userid();
        $data = $schedule->where('doctorid', $userid);
        $channeling = new channeling();

        if ($z1 = $channeling->where('doctorid',$userid)){
            $data3 = count($z1);
        } else {
            $data3 = 0;
        }
        print_r($data3);
        die;


        $this->view("doctor/doctor", [
            'rows' => $data,
            'data2' => $data2,
            'data3' => $data3,
        ]); //in here put the relevent page name and the path
    }

    //function for registration
    function registration()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        if (count($_POST) > 0) {

            $doctors = new doctors(); //create the instance of the doctor in model
            
            $userName = Auth::username();

            if ($doctors->validate($_POST, $_FILES,$userName)) {
                global $des;
                $arr['userid'] = AUTH::userid();
                $arr['nameWithInitials'] = Auth::nameWithInitials();
                $arr['gender'] = Auth::gender();
               // $arr['dob'] = Auth::dob();
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['specialities'] = htmlspecialchars($_POST['specialities']);
                $arr['hospital'] = htmlspecialchars($_POST['hospital']);
                $arr['city'] = htmlspecialchars($_POST['city']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;
               // print_r($arr);
               // die;
                //$arr['image'] = $des2;

                //$orig_file = $_FILES["avatar"]["tmp_name"];
                // $target_dir = 'doctor_profilepic/';
                // $destination = $target_dir . basename($_FILES["avatar"]["name"]);
                // move_uploaded_file($orig_file,$destination) //moving the file

                // exit(); //Stop uploading the image for the database

                $doctors->insert($arr);
                $this->redirect('home/home');
            } else {
                $errors = $doctors->errors;
            }
        }
        $this->view('doctor/doctorregi', [
            'errors' => $errors,
        ]);
    }
    //get the file destination of the image
    function get_destination($destination)
    {
        global $des;
        $des = $destination;
        return $des;
    }

    //get the file destination of the image2
    /*function get_destination($destination)
    {
         global $des2;
         $des2 =$destination2;
         return $des2;
    }*/
    //function of the Doctor Dashboard
    function docDashboard()
    {
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);

        $schedule = new schedule();

        $row=$schedule->where('doctorid', $doctorid);

        $Auth = new Auth;
        $userid = Auth::userid();
        //Taking the count of patients appointments and revenue
        $patients = new patients();
        $appointments = new appointments();
        $data3 = $appointments->where('doctorid',$userid);
        $pCount = count($data3);
        //to filter by date
        /*$data2 = $patients->findrange(7);
        if ($data2 == null || count($data2) < 4) {
            $query1 = "select * from patients order by articleid desc limit 6";
            $data2 = $patients->query($query1);
        }*/
        

        $appointments = new appointments();
        $data4 = $appointments->where('doctorid',$userid);
        $aCount = count($data4);
        //print_r($data4);
       // print_r(" ");
        //die;

        //----------------------------//
        $channelingid=null;
        $patientid=null;
        $scheduleid=null;

        $query1 = "select * from appointments where doctorid = :userid and date > curdate()-7 order by date desc";
        $arr['userid'] = Auth::userid();
        $data5 = $appointments->query($query1,$arr);

       // $query2 = "select * from schedule where scheduleid in (select scheduleid from appointments where doctorid = :userid order by date desc )";
        //$arr['userid'] = Auth::userid();
       // $data1 = $schedule->query($query2,$arr);
       // print_r($data1);
      
        //$appointments = new appointments();
        //$data5 = $appointments->where2('doctorid',$userid,'scheduleid',$scheduleid);
        //print_r($data5);
        
       // $schedule = new schedule();
       // $data1= $schedule->where('scheduleid',$scheduleid);
        //print_r($data1);
     
       // if ($data1) {
         //   $data1 = $data1[0];
       // }
        //print_r($data1);

        $this->view("doctor/docDashboard", [
            'data' => $data,
            'row' => $row,
            'pCount' => $pCount,
            'aCount' => $aCount,
            'data5' => $data5,
            //'data1' => $data1,
        ]);
    }

    //function to view account
    function viewAccount($userid = [])
    {
        //$doctorid = Auth::userid();

        $errors = array();
        $doctors = new doctors();

        $userid = Auth::userid();
        $rows = $doctors->where('userid', $userid); //in here row is an array
        //$data2 = $doctors->findAll();
        if ($rows) {
            $rows = $rows[0];
        }
        $this->view('doctor/viewAccount', [
            'errors' => $errors,
            'rows' => $rows,
            //'data2'=>$data2,
        ]);
    }
    //function to edit account
    function editAccount($userid = null)
    {
        if (!Auth::logged_in())  //checking if the user is logged in if not redirect to the login page
        {
            $this->redirect('login/login');
        }

        $errors = array();
        $doctors = new doctors();

        $userName = Auth::username();

        if (count($_POST) > 0) {

            if ($doctors->validate($_POST, $_FILES,$userName)) {
                global $des;
                //global $des2;
                $arr['userid'] = AUTH::userid();
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['dob'] = htmlspecialchars($_POST['dob']);
                $arr['registrationNumber'] = $_POST['registrationNumber'];
                $arr['specialities'] = $_POST['specialities'];
                $arr['hospital'] = $_POST['hospital'];
                $arr['city'] = $_POST['city'];
                $arr['address'] = $_POST['address'];
                $arr['image'] = $des;
                // $arr['image2'] = $des2;

                $doctors->update($userid, $arr);
                $this->redirect('doctor/viewAccount');
            } else {
                $errors = $doctors->errors;
            }
        }
        $row = $doctors->where('userid', $userid);
        // print_r($row);      
        if ($row) {
            $row = $row[0];
            if (file_exists($row->image)) {
                unlink($row->image);
            }
        }
        $this->view('doctor/editAccount', [
            'errors' => $errors,
            'row' => $row,
        ]);
    }
    //function to delete account
    function deleteAccount($userid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $errors = array();
        $doctors = new doctors();


        if (count($_POST) > 0) {
            //print_r($data);
            //die;
            $doctors->delete($userid);
            $this->redirect('doctor/viewAccount');
        }
        $row = $doctors->where('userid', $userid);
        //$data2 = $doctors->findAll();
        if ($row) {
            $row = $row[0];
            unlink($row->image);
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);
        $this->view('doctor/deleteAccount', [
            'row' => $row,
            'data' => $data,
        ]);
    }

    //get the patient count
    function get_patientcount($pactientc)
    {
        global $coun;
        $coun = $pactientc;
        return $coun;
    }

    //get the tim difference for the patient
    // function get_time($patientcount,$arrivalTime,$timeperPatient){
        // if (count == 1;count <= $patientcount; count++ ) {
            // $arrivalTime = $arrivalTime + $DATA['timeperPatient'];
            // print_r("Hello");
       // }
    //}

    //function to add schedule
    function addSchedule()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();

        if (count($_POST) > 0) {
            $schedule = new schedule();
            $doctor = new doctors();
            $userid = Auth::userid();
            global $coun;
            //$row = $doctor->where('userid',$userid); 
            // print_r($_POST);
            if ($schedule->validate($_POST, $_FILES)) {

                $arr['slotNumber'] = $_POST['slotNumber'];
                $arr['dateofSlot'] = $_POST['dateofSlot'];
                $arr['arrivalTime'] = $_POST['arrivalTime'];
                $arr['departureTime'] = $_POST['departureTime'];
                $arr['noOfPatient'] = $coun;//need to change
                $arr['timePerPatient'] = $_POST['timePerPatient'];
                $arr['doctorCharge'] = $_POST['doctorCharge'];
                $arr['doctorNote'] = $_POST['doctorNote'];
                //$arr['DoctorName'] = $nameWithInitials;
                //$arr['city'] = $city;
                
                // print_r($arr['arrivalTime']);
                // print_r($arr['departureTime']);
                // die;
                $arr['doctorid'] = Auth::userid();
                // print_r($arr);
                $schedule->insert($arr);
                $this->redirect('doctor/viewSchedule');
            } else {
                $errors = $schedule->errors2;
            }
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $row = $doctor->where('userid', $doctorid);

        $this->view('doctor/addSchedule', [
            'errors' => $errors,
            'row' => $row,
        ]);
    }

    //function to view schedule
    function viewSchedule($scheduleid = null)
    {
        $doctorid = Auth::userid();

        $errors = array();
        $schedule = new schedule();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);

        //$rows =$schedule->where('scheduleid',$scheduleid);
        $row = $schedule->where('doctorid', $doctorid); // ps changed to remove the slots when another user loged in
        //to get the date filter 
        if(count($_POST)>0){
            
                $date1=$_POST['fromdate'];
                $date2=$_POST['todate'];
                //print_r($date1);
              
                $row= $schedule->finddaterange($date1,$date2);
                //print_r($row); 
                
            
        }
        $this->view('doctor/viewSchedule', [
            'errors' => $errors,
            'row' => $row,
            'data' => $data,

        ]);
    }
    //function to edit schedule
    function editSchedule($scheduleid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        $schedule = new schedule();

        if (count($_POST) > 0) {

            if ($schedule->validate2($_POST, $_FILES)) {

                $arr['slotNumber'] = $_POST['slotNumber'];
                $arr['dateofSlot'] = $_POST['dateofSlot'];
                $arr['arrivalTime'] = $_POST['arrivalTime'];
                $arr['departureTime'] = $_POST['departureTime'];
               // $arr['noOfPatient'] = $_POST['noOfPatient'];
                $arr['timePerPatient'] = $_POST['timePerPatient'];
                $arr['doctorCharge'] = $_POST['doctorCharge'];
                $arr['doctorNote'] = $_POST['doctorNote'];

                $schedule->update($scheduleid, $arr);
                $this->redirect('doctor/viewSchedule');
            } else {
                $errors = $schedule->errors3;
            }
        }
        $row = $schedule->where('scheduleid', $scheduleid);
        // print_r($row);
         //die;
        //in here row is an array

        if ($row) {
            $row = $row[0];
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);
        $this->view('doctor/editSchedule', [
            'errors' => $errors,
            'row' => $row,
            'data' => $data,

        ]);
    }
    function scheduleDetails($scheduleid = null)
    {

        $schedule = new schedule();
        $data = $schedule->where('scheduleId', $scheduleid);

        $doctorid = Auth::userid();
        $doctor = new doctors();
        $row = $doctor->where('userid', $doctorid);

        $this->view('doctor/scheduleDetails', [
            'rows' => $data,
            'row' => $row,
        ]);
    }

    function deleteSchedule($scheduleid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $errors = array();
        $schedule = new schedule();

        if (count($_POST) > 0) {
            //print_r($data);
            //die;
            $schedule->delete($scheduleid);
            $this->redirect('doctor/viewSchedule');
        }
        $row = $schedule->where('scheduleid', $scheduleid); //in here row is an array
        if ($row) {
            $row = $row[0];
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);

        $this->view('doctor/deleteSchedule', [
            'row' => $row,
            'data' => $data,
        ]);
    }
    function patientReports()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $doctorid = Auth::userid();
        $doctor = new doctors();

        $channeling = new channeling();
        $data = null;

        $payments = new channelingpayments();

        if(null!=($payments->where('doctorid',$doctorid)))
        { 
            $data = $channeling->where('doctorid',$doctorid);
        }
        // print_r($data);
        // die;

        if ($data) {
            $row = $data[0];
        }


        //$data =$doctor->where('userid',$doctorid);
        $this->view('doctor/patientReports', [
            'data' => $data,
        ]);
    }
    function reportsview()
    {
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);
        $this->view('doctor/reportsview', [
            'data' => $data,
        ]);
    }

    function paymentReports()
    {  
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();

        $channeling = new channeling();
        $data = null;

         $payments = new channelingpayments();

      if(null!=($payments->where('doctorid',$doctorid)))
      { 
          $data = $channeling->where('doctorid',$doctorid);
      }

      if ($data) {
          $row = $data[0];
      }
        $this->view("doctor/paymentReports",[
            'data'=>$data,
        ]); 
    }

    function reportDetails($patientid = null, $channelingid = null,$scheduleid=null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $Auth = new Auth;
        $userid = Auth::userid();

        $doctors = new doctors();
        $row['doctor'] = $doctors->where('userid', $userid);
        // if ($row) {
        //     $row = $row[0];
        // }

        $channeling = new channeling();
        $row['channeling'] = $channeling->where('channelingid', $channelingid);
        // if ($row2) {
        //     $row2 = $row2[0];
        // }

        $common_user = new common_user();
        $row['commonuser'] = $common_user->where('userid', $patientid);
        // if ($row3) {
        //     $row3 = $row3[0];
        // }

        $payments = new channelingpayments();
        $row['payments'] = $payments->where('channelingid', $channelingid);
        // if ($row4) {
        //     $row4 = $row4[0];
        // }

        $schedule = new schedule();
        $row['schedule']= $schedule->where('scheduleid',$scheduleid); 

        $patient = new patients();
        $row['patient'] = $patient->where('userid',$patientid);


        // print_r($row['schedule']);
        // die;

        extract($row);
        $this->view("doctor/reportDetails", [
            'row' => $row,
        ]);
    }

    //function to view appointments
    function viewAppointments()
    {
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);
        if($data)
        {
            $data=$data[0];
        }

        $schedule = new schedule();

        $row=$schedule->where('doctorid', $doctorid);

        $this->view("doctor/viewAppointments", [
            'data' => $data,
            'row' => $row,
            
        ]);
    }

    //function to view appointment details
    function appointmentDetails($scheduleid=null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $Auth = new Auth;
        $userid = Auth::userid();

        $channelingid=null;
        $patientid=null;

        //$doctorid = Auth::userid();
        //$doctor = new doctors();
        //$data = $doctor->where('userid', $userid);

        //Comparing the the doctorid and the userid and taking the patient details from the required patient id
        /*$patient = new patients();
        $query="select * from patients where userid in (select Patientid from appointments where doctorid = :userid and scheduleid = :scheduleid)";
        $arr4['userid'] = $userid;
        $arr4['scheduleid'] = $scheduleid;
        $data4 = $patient->query($query, $arr4);*/
        //print_r($data4);
        

        $appointments = new appointments();
        $data5 = $appointments->where2('doctorid',$userid,'scheduleid',$scheduleid);
        //print_r($data5);
        
        
        
        $schedule = new schedule();
        $data1= $schedule->where('scheduleid',$scheduleid);

        if ($data1) {
            $data1 = $data1[0];
        }

       // print_r($data1);
        
        $this->view("doctor/appointmentDetails", [
            'data5' => $data5,
            'data1' => $data1,
        ]);
    }
    //function to view feedback
    function feedback()
    {
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data = $doctor->where('userid', $doctorid);

        $this->view("doctor/feedback", [
            'data' => $data,
            
        ]);
    }

    //add article
    function addArticles()
    {
        $Auth = new Auth;
        $data2 = $Auth->finduser();
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        if ((!$data2 == "doctor") || (!$data2 == "doctorAndSeller") || (!$data2 == "doctorAndPatient") || (!$data2 == "allUser")) {
            $this->redirect('login/login');
        }

        $doctorid = Auth::userid();

        $errors = array();

        if (count($_POST) > 0) {

            //print_r($_POST);
            //die;

            $article = new article();

            if ($article->validate($_POST, $_FILES)) {
                global $des;
                $arr['articleName'] = htmlspecialchars($_POST['articleName']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['uses'] = htmlspecialchars($_POST['uses']);
                $arr['sideEffects'] = htmlspecialchars($_POST['sideEffects']);
                $arr['precautions'] = htmlspecialchars($_POST['precautions']);
                $arr['interactions'] = htmlspecialchars($_POST['interactions']);
                $arr['dosing'] = htmlspecialchars($_POST['dosing']);
                $arr['image'] = $des;
                $arr['doctorid'] = Auth::userid();
                $arr['date'] = date("Y-m-d");

                //print_r($arr);
                // die;

                $article->insert($arr);
                $this->redirect('header/viewArticles'); //controller/function name
            } else {
                $errors = $article->errors2;
            }
        }

        $this->view('articles/addArticles', [
            'errors' => $errors,
        ]);
    }

    //manage articles
    function myArticles()
    {
        $Auth = new Auth;
        $data2 = $Auth->finduser();
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        if ((!$data2 == "doctor") || (!$data2 == "doctorAndSeller") || (!$data2 == "doctorAndPatient") || (!$data2 == "allUser")) {
            $this->redirect('login/login');
        }

        $doctorid = Auth::userid();
        $article = new article();
        $data = $article->where('doctorid', $doctorid);
        $this->view('articles/manageArticles', [
            'data' => $data,
        ]);
        //articles details function is in the articles controller
    }

    //edit articles
    function editArticles($articleid)
    {
        $Auth = new Auth;
        $data2 = $Auth->finduser();
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        } elseif ((!$data2 == "doctor") || (!$data2 == "doctorAndSeller") || (!$data2 == "doctorAndPatient") || (!$data2 == "allUser")) {
            $this->redirect('login/login');
        }

        $errors = array();
        $articles = new article();

        if (count($_POST) > 0) {

            if ($articles->validate($_POST, $_FILES)) {
                global $des;
                $arr['articleName'] = htmlspecialchars($_POST['articleName']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['uses'] = htmlspecialchars($_POST['uses']);
                $arr['sideEffects'] = htmlspecialchars($_POST['sideEffects']);
                $arr['precautions'] = htmlspecialchars($_POST['precautions']);
                $arr['interactions'] = htmlspecialchars($_POST['interactions']);
                $arr['dosing'] = htmlspecialchars($_POST['dosing']);
                $arr['image'] = $des;


                $articles->update($articleid, $arr);

                $this->redirect('doctor/myArticles');
            } else {
                $errors = $articles->errors2;
            }
        }
        $data = $articles->where('articleid', $articleid);
        if ($data) {
            $data = $data[0];
            if (file_exists($data->image)) {
                unlink($data->image);
            }
        }
        $this->view('articles/editArticles', [
            'data' => $data,
            'errors' => $errors,
        ]);
    }

    //delete aticles
    function deletearticle($articleId = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        $articles = new article();

        if (count($_POST) > 0) {

            $articles->delete($articleId);
            $this->redirect('seller');
        }
        $row = $articles->where('productid', $articleId); //in here row is an array
        $data = $articles->where('productid', $articleId);
        if ($row) {
            $row = $row[0];
            unlink($row->image);
        }
        $this->view('seller/deleteProduct', [
            'row' => $row,
            'rows' => $data,
        ]);
    }
}

