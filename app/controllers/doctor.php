<?php
class doctor extends Controller
{
    function index()
    {
      
    //if(!Auth::logged_in())
       //{
         //  $this->redirect();

      // }

       $common_user = new common_user();
        $data = $common_user->findAll();

        $this->view("doctor/doctor",$data); //in here put the relevent page name and the path
    }

    //function for registration
    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $doctors = new doctors();//create the instance of the seller in model
            
            if($doctors->validate($_POST,$_FILES))
            {
                global $des;
                $arr['userid'] = AUTH::userid();
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['dob'] = htmlspecialchars($_POST['dob']);
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['specialities'] = htmlspecialchars($_POST['specialities']);
                $arr['qualifications'] = $des;
             
               
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
     //get the file destination
    function get_destination($destination)
    {
         global $des;
         $des =$destination;
         return $des;
    }

    function account()
    {
      
      // $account = new account();
        
        $this->view("doctor/doctorAccount",$data); //in here put the relevent page name and the path
    }

   
    //function to add schedule
    function addSchedule()
    {
        $errors = array();
        
        if(count($_POST)>0)
        {
            //print_r($_POST);
  
            $schedule = new schedule();

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
              
                //print_r($arr);
            

                $schedule->insert($arr);
                $this->redirect('doctor/viewSchedule');
            }
            else{
                $errors = $schedule->errors2;
            }
        } 
        $this->view('doctor/addSchedule',[
			'errors'=>$errors,
		]);

    }

    //function to view schedule
    function viewSchedule($scheduleid = null)
    {
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
                $this->redirect('doctor');
            }
            else{
                $errors = $schedule->errors2;
            }
        }
        $row =$schedule->where('scheduleid',$scheduleid); //in here row is an array
        $data2 = $schedule->findAll();
        
        $this->view('doctor/viewSchedule',[
			'errors'=>$errors,
            'row'=>$row,
            'data2'=>$data2,
		]);

    }
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
       // $data2 =$schedule->where('scheduleid',$scheduleid);
         if($row)
        {
            $row = $row[0];
        }
        $this->view('doctor/deleteSchedule',[
            'row'=>$row,
            //'rows'=>$data2,
            //'data2'=>$data2,
		]);

    }
}
?>
