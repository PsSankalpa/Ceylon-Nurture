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
      
       $account = new account();
        

        $this->view("doctor/doctorAccount",$data); //in here put the relevent page name and the path
    }

   

    function addSchedule()
    {
        $errors = array();
        
        if(count($_POST)>0)
        {
            $schedules = new schedules();

            if($schedules->validate($_POST,$_FILES))
            {
                global $des;
                $arr['slot'] = $_POST['slot'];
                $arr['date'] = $_POST['date'];
                $arr['arrivalTime'] = $_POST['arrivalTime'];
                $arr['arrivalTime'] = $_POST['arrivalTime'];
                $arr['departureTime'] = $_POST['departureTime'];
                $arr['noOfPatient'] = $_POST['noOfPatient'];
                $arr['timePerPatient'] = $_POST['timePerPatient'];
                $arr['doctorCharge'] = $_POST['doctorCharge'];
                $arr['doctorNote'] = $_POST['doctorNote'];
               
                $schedules->insert($arr);
                $this->redirect('doctor/addSchedule');
            }
            else{
                $errors = $schedules->errors2;
            }
        } 
        $this->view('doctor/addSchedule',[
			'errors'=>$errors,
		]);

    }



}
?>
