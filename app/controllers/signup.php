<?php
class signup extends Controller
{
    function index()//we can take the values in the url in by this way
    {
        // code
        $errors = array();
        if(count($_POST) > 0)
        {
            $common_user = new common_user();

            if($common_user->validate($_POST))
            {
                $arr['fname'] = htmlspecialchars($_POST['fname']);
                $arr['lname'] = htmlspecialchars($_POST['lname']);
                $arr['username'] = htmlspecialchars($_POST['username']);
                $arr['email'] = htmlspecialchars($_POST['email']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['password'] = $_POST['password']; 
               // $arr['date'] = date("Y-m-d H:i:s");

                $common_user->insert($arr);
                $this->redirect('login/login');
            }else
            {
                //errors
               $errors = $common_user->errors;
            }
        }
        
        $this->view('signup',[
           'errors'=>$errors,
        ]);
    }
}

?>
