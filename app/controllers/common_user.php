<?php
class common_user extends Controller
{
    function index()
    {
        $common_user = new Common_User();


        $this->view('signup');

    }
    //function for registration
    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $common_user = new Common_User();//create the instance of the user in model
            
            if($common_user->validate($_POST))
            {
                global $des;
                $arr['fname'] = htmlspecialchars($_POST['fname']);
                $arr['lname'] = htmlspecialchars($_POST['lname']);
                $arr['username'] = htmlspecialchars($_POST['username']);
                $arr['email'] = htmlspecialchars($_POST['email']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['password'] = htmlspecialchars($_POST['password']);
                $arr['password2'] = htmlspecialchars($_POST['password2']);
                $arr['conditions'] = htmlspecialchars($_POST['conditions']);
                

                $common_user->insert($arr);
                $this->redirect('login');
            }
            else{
                $errors = $common_user->errors;
            }
        } 
        $this->view('signup',[
			'errors'=>$errors,
		]);


}