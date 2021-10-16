<?php
class doctor extends Controller
{
    function index()
    {
      
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $schedule = new schedule();
        $userid = Auth::userid();
        $data = $schedule->where('doctorid',$userid); 

        //$common_user = new common_user(); ////Find all function which should be deleted
        //$data = $common_user->findAll();

        $this->view("doctor/doctor",$data); //in here put the relevent page name and the path
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
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['dob'] = htmlspecialchars($_POST['dob']);
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['specialities'] = htmlspecialchars($_POST['specialities']);
                $arr['hospital'] = htmlspecialchars($_POST['hospital']);
                $arr['city'] = htmlspecialchars($_POST['city']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;
                //print_r($arr);
                //die;
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

    //function to view account
    function viewAccount($userid=[])
    {
        $errors = array();
        $doctors = new doctors();
        

        $row =$doctors->where('userid',$userid); //in here row is an array
        $data2 = $doctors->findAll();
        
        $this->view('doctor/viewAccount',[
			'errors'=>$errors,
            'row'=>$row,
            'data2'=>$data2,
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
                $arr['nameWithInitials'] = $_POST['nameWithInitials'];
                $arr['gender'] = $_POST['gender'];
                $arr['dob'] = $_POST['dob'];
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
       //in here row is an array
        
        if($row)
        {
            $row = $row[0];
            unlink($row->image);
       
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
        $row =$doctors->where('userid',$userid); //in here row is an array
         if($row)
        {
            $row = $row[0];
            unlink($row->image);
        }
        $this->view('doctor/deleteAccount',[
            'row'=>$row,
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
            if(!empty($row = $doctor->where('userid',$userid) ))
            //if(!empty($row))
            {
               $row = $row[0];
               $nameWithInitials= $row->nameWithInitials;
              $city = $row->city;
            }
            else{
                $nameWithInitials = "";
                $city = "";
            }
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
        $this->view('doctor/addSchedule',[
			'errors'=>$errors,
            //'row' =>$row,
		]);
    }

    //function to view schedule
    function viewSchedule($scheduleid = null)
    {
        //$doctorid = Auth::userid();
       
        $errors = array();
        $schedule = new schedule();
        
        $row =$schedule->where('scheduleid',$scheduleid);
        $data2 = $schedule->findAll(); //in here row is an array
        //$row =$schedule->where('doctorid',$doctorid); // ps changed to remove the slots when another user loged in
        //if($row)
        //{
           // $row = $row[0];
         
       // }
        $this->view('doctor/viewSchedule',[
			'errors'=>$errors,
            //'row'=>$row,
            'data2'=>$data2,
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
        $this->view('doctor/editSchedule',[
			'errors'=>$errors,
            'row'=>$row,

		]);
    }
    function scheduleDetails($scheduleid = null)
    {
    
        $schedule = new schedule();
        $data =$schedule->where('scheduleId',$scheduleid); 


        $this->view('doctor/scheduleDetails',['rows'=>$data]);
       
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
        $this->view('doctor/deleteSchedule',[
            'row'=>$row,
		]);

    }
      //function to view appointments
    function appointments($scheduleid = null)
    {
      $errors = array();
      $schedule = new schedule();
      
      $data2 =$schedule->where('scheduleid',$scheduleid); //in here row is an array
      $data2 = $schedule->findAll();
      
      $this->view('doctor/appointments',[
        'errors'=>$errors,
        //'row'=>$row,
        'data2'=>$data2,
    ]);
    }

    function reports($reportsid = null)
    {
        //$reports = new reports();
        //$data =$reports->where('reportsid',$reportsid);  

        //print_r("$data");
        //die;
        $this->view('doctor/reports',[
           // 'rows'=>$data,
        ]); 
    }

}
?>
