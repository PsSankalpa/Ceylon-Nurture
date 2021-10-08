<?php
class patient extends Controller
{
    /*function index()
    {
      
       $patient = new patient();
        //$data = $common_user->findAll();

        $this->view("patient/patient",['rows'=>$data]); //in here put the relevent page name and the path
    } 
*/
    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $patients = new patients();//create the instance of the patient in model
            
            if($patients->validate($_POST,$_FILES))
            {
                global $des;
                $arr['userid'] = Auth::userid();
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['DOB'] = htmlspecialchars($_POST['DOB']);
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['image'] = $des;
             
               
                $patients->insert($arr);
                $this->redirect('home/home');
            }
            else{
                $errors = $patients->errors;
            }
        } 
        $this->view('patient/patientregi',[
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

}
