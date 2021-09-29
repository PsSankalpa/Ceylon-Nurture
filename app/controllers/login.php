<?php
class login extends Controller
{
    function index()
    {
        //code
        $errors = array();

        if(count($_POST) > 0)
        {
            $common_user = new common_user();
            if($row = $common_user->where('email',$_POST['email']))
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))
                {
                    Auth::authenticate($row);//creating a class
                    $this->redirect('/home2');
                }
            }
            $errors['email'] = "Wrong email or password";

        }
        $this->view('login',[
            'errors' =>$errors,
        ]); 
    }
}

?>
