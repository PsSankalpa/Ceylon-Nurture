<?php
class doctor extends Controller
{
    function index()
    {
      
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
        $Auth = new Auth;
        $data2 = $Auth->finduser();

        $schedule = new schedule();
        $userid = Auth::userid();
        $data = $schedule->where('doctorid',$userid); 

        $this->view("doctor/doctor",[
            'rows'=>$data,
            'data2'=>$data2
        ]); //in here put the relevent page name and the path
    }

    //function for registration
    function registration()
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        if(count($_POST)>0)
        {
            
            $doctors = new doctors();//create the instance of the doctor in model

            if($doctors->validate($_POST,$_FILES))
            {
                global $des;
                $arr['userid'] = AUTH::userid();
                $arr['nameWithInitials'] = Auth::nameWithInitials();
                $arr['gender'] = Auth::gender();
                $arr['dob'] = Auth::dob();
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['specialities'] = htmlspecialchars($_POST['specialities']);
                $arr['hospital'] = htmlspecialchars($_POST['hospital']);
                $arr['city'] = htmlspecialchars($_POST['city']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;
                //$arr['image'] = $des2;
                
                //$orig_file = $_FILES["avatar"]["tmp_name"];
               // $target_dir = 'doctor_profilepic/';
               // $destination = $target_dir . basename($_FILES["avatar"]["name"]);
               // move_uploaded_file($orig_file,$destination) //moving the file
               
               // exit(); //Stop uploading the image for the database

                $doctors->insert($arr);
                $this->redirect('doctor');
            }
            else{
                $errors = $doctors->errors;
            }
        } 
        $this->view('doctor/doctorregi',[
			'errors'=>$errors,
		]);
    }
     //get the file destination of the image
    function get_destination($destination)
    {
         global $des;
         $des =$destination;
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
          $data =$doctor->where('userid',$doctorid);  
   
           $this->view("doctor/docDashboard",[
               'data'=>$data,
           ]); 
       }

    //function to view account
    function viewAccount($userid=[])
    {
        //$doctorid = Auth::userid();

        $errors = array();
        $doctors = new doctors();
        
        $userid = Auth::userid();
        $rows = $doctors->where('userid',$userid);//in here row is an array
       //$data2 = $doctors->findAll();
        if($rows)
        {
            $rows = $rows[0];
        }
        $this->view('doctor/viewAccount',[
			'errors'=>$errors,
            'rows'=>$rows,
            //'data2'=>$data2,
		]);

    }
    //function to edit account
    function editAccount($userid = null)
    {
        if(!Auth::logged_in())  //checking if the user is logged in if not redirect to the login page
        {
         $this->redirect('login/login');
        }

        $errors = array();
        $doctors = new doctors();
        
        if(count($_POST)>0)
        {
            
            if($doctors->validate($_POST,$_FILES))
            {
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

                $doctors->update($userid,$arr);
                $this->redirect('doctor/viewAccount');
            }
            else{
                $errors = $doctors->errors;
            }
        }
        $row =$doctors->where('userid',$userid); 
       // print_r($row);      
        if($row)
        {
            $row = $row[0];
            if(file_exists($row->image)){
            unlink($row->image);
            }
       
        }
        $this->view('doctor/editAccount',[
			'errors'=>$errors,
            'row'=>$row,
		]);

    }
    //function to delete account
    function deleteAccount($userid = null)
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
        $errors = array();
        $doctors = new doctors();
        

        if(count($_POST)>0)
        {
            //print_r($data);
            //die;
                $doctors->delete($userid);
                $this->redirect('doctor/viewAccount');
          
        }
        $row =$doctors->where('userid',$userid);
        //$data2 = $doctors->findAll();
         if($row)
        {
            $row = $row[0];
            unlink($row->image);
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data =$doctor->where('userid',$doctorid);
        $this->view('doctor/deleteAccount',[
            'row'=>$row,
            'data'=>$data,
		]);

    }

    //function to add schedule
    function addSchedule()
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        
        if(count($_POST)>0)
        {
            $schedule = new schedule();
            $doctor = new doctors();
            $userid = Auth::userid();
            //$row = $doctor->where('userid',$userid); 
           // print_r($_POST);
            if($schedule->validate($_POST,$_FILES))
            {
               
                $arr['slotNumber'] = $_POST['slotNumber'];
                $arr['dateofSlot'] = $_POST['dateofSlot'];
                $arr['arrivalTime'] = $_POST['arrivalTime'];
                $arr['departureTime'] = $_POST['departureTime'];
                $arr['noOfPatient'] = $_POST['noOfPatient'];
                $arr['timePerPatient'] = $_POST['timePerPatient'];
                $arr['doctorCharge'] = $_POST['doctorCharge'];
                $arr['doctorNote'] = $_POST['doctorNote'];
                //$arr['DoctorName'] = $nameWithInitials;
                //$arr['city'] = $city;
                $arr['doctorid'] = Auth::userid(); 
               // print_r($arr);
                $schedule->insert($arr);
                $this->redirect('doctor/viewSchedule');
            }
            else{
                $errors = $schedule->errors2;    
            }
        } 
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $row =$doctor->where('userid',$doctorid);

        $this->view('doctor/addSchedule',[
			'errors'=>$errors,
             'row' =>$row,
		]);
    }

    //function to view schedule
    function viewSchedule($scheduleid = null)
    {
        $doctorid = Auth::userid();
       
        $errors = array();
        $schedule = new schedule();
        $doctor = new doctors();
        $data =$doctor->where('userid',$doctorid);
        
        //$rows =$schedule->where('scheduleid',$scheduleid);
        $row =$schedule->where('doctorid',$doctorid); // ps changed to remove the slots when another user loged in
      /*if($row)
        {
            $row = $row[0];
        }*/

        $this->view('doctor/viewSchedule',[
			'errors'=>$errors,
            'row'=>$row,
            'data'=>$data,
            
		]);
    }
      //function to edit schedule
    function editSchedule($scheduleid = null)
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        $schedule = new schedule();
        
        if(count($_POST)>0)
        {
            
            if($schedule->validate($_POST,$_FILES))
            {
                
                $arr['slotNumber'] = $_POST['slotNumber'];
                $arr['dateofSlot'] = $_POST['dateofSlot'];
                $arr['arrivalTime'] = $_POST['arrivalTime'];
                $arr['departureTime'] = $_POST['departureTime'];
                $arr['noOfPatient'] = $_POST['noOfPatient'];
                $arr['timePerPatient'] = $_POST['timePerPatient'];
                $arr['doctorCharge'] = $_POST['doctorCharge'];
                $arr['doctorNote'] = $_POST['doctorNote'];

                $schedule->update($scheduleid,$arr);
                $this->redirect('doctor/viewSchedule');
            }
            else{
                $errors = $schedule->errors2;
            }
        }
        $row =$schedule->where('scheduleid',$scheduleid); 
       // print_r($row);
       //in here row is an array
        
        if($row)
        {
            $row = $row[0];
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data =$doctor->where('userid',$doctorid);
        $this->view('doctor/editSchedule',[
			'errors'=>$errors,
            'row'=>$row,
            'data'=>$data,

		]);
    }
    function scheduleDetails($scheduleid = null)
    {
    
        $schedule = new schedule();
        $data =$schedule->where('scheduleId',$scheduleid); 

        $doctorid = Auth::userid();
        $doctor = new doctors();
        $row =$doctor->where('userid',$doctorid);

        $this->view('doctor/scheduleDetails',[
            'rows'=>$data,
            'row'=>$row,
        ]);
       
    }

    function deleteSchedule($scheduleid = null)
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
        $errors = array();
        $schedule = new schedule();
        
        if(count($_POST)>0)
        {
            //print_r($data);
            //die;
                $schedule->delete($scheduleid);
                $this->redirect('doctor/viewSchedule');
        }
        $row =$schedule->where('scheduleid',$scheduleid); //in here row is an array
         if($row)
        {
            $row = $row[0];
        }
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data =$doctor->where('userid',$doctorid);

        $this->view('doctor/deleteSchedule',[
            'row'=>$row,
            'data'=>$data,
		]);

    }
    function reports()
    {
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data =$doctor->where('userid',$doctorid);
        //$reports = new reports();
        $this->view('doctor/reports',[
            'data'=>$data,
        ]); 
    }
    function reportDetails()
    {  
      $doctorid = Auth::userid();
      $doctor = new doctors();
      $data =$doctor->where('userid',$doctorid);  

        $this->view("doctor/reportDetails",[
            'data'=>$data,
        ]); 
    }
    
     //function to view appointments
    function viewAppointments()
    { 
       $doctorid = Auth::userid();
       $doctor = new doctors();
       $data =$doctor->where('userid',$doctorid);  

        $this->view("doctor/viewAppointments",[
            'data'=>$data,
        ]); 
    }

     //function to view appointment details
    function appointmentDetails()
    {
       $doctorid = Auth::userid();
       $doctor = new doctors();
       $data =$doctor->where('userid',$doctorid);    
  
        $this->view("doctor/appointmentDetails",[
            'data'=>$data,
        ]); 
    }
    //function to view feedback
    function feedback()
    {   
        $doctorid = Auth::userid();
        $doctor = new doctors();
        $data =$doctor->where('userid',$doctorid);  
  
        $this->view("doctor/feedback",[
            'data'=>$data,
        ]); 

    }
    function myArticles()
    {
        $Auth = new Auth;
        $data2 = $Auth->finduser(); 
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
        if((!$data2 == "doctor") || (!$data2 == "doctorAndSeller") || (!$data2 == "doctorAndPatient") || (!$data2 == "allUser"))
        {
            $this->redirect('login/login');
        }

        $doctorid = Auth::userid();
        $article = new article();
        $data =$article->where('doctorid',$doctorid); 
        $this->view('articles/manageArticles',[
			'data'=>$data,
		]);
    }

    function editArticles($articleid)
    {
        $Auth = new Auth;
        $data2 = $Auth->finduser(); 
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
        elseif((!$data2 == "doctor") || (!$data2 == "doctorAndSeller") || (!$data2 == "doctorAndPatient") || (!$data2 == "allUser"))
        {
            $this->redirect('login/login');
        }
        
        $articles = new article();

        if(count($_POST)>0)
        {
            if($articles->validate())
            {
                $this->redirect('doctor/myArticles');
            }
            
        }
        $data =$articles->where('articleid',$articleid); 
        if($data)
        {
            $data = $data[0];
        }
        $this->view('articles/editArticles',[
            'data'=>$data,
        ]);  
    }

}
?>
