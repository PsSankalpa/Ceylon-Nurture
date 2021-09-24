<?php
class user extends Controller
{
    function index()
    {
        $users = new Users();


        $this->view('signup');

    }
    //function for registration
    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $users = new Users();//create the instance of the user in model
            
            if($users->validate($_POST))
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
                

                $users->insert($arr);
                $this->redirect('login');
            }
            else{
                $errors = $users->errors;
            }
        } 
        $this->view('signup',[
			'errors'=>$errors,
		]);


}