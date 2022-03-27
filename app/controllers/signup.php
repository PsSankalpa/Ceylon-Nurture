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
            print_r($_POST);
          

            if($common_user->validate($_POST))
            {
                
               // $arr['date'] = date("Y-m-d H:i:s");
               $arr['userid'] = AUTH::userid();
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['verify_token'] = 'none';
                $arr['username'] = htmlspecialchars($_POST['username']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['email'] = htmlspecialchars($_POST['email']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['password'] = htmlspecialchars($_POST['password']);
                $arr['date'] = date("Y/m/d");
               // print_r($arr);
               // die;
                $common_user->insert($_POST);
                //print_r($_POST);
                $this->redirect('login');
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
