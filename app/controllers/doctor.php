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
                $arr['profilePhoto'] = $des;
                $arr['Qualifications'] = $des;
             
               
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


}
?>