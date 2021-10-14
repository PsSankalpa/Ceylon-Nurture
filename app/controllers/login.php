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

                    Auth::authenticate($row);//creating a class,by putting "::" this run in static mode,from this we authinticate the user
                    $this->redirect('landing/home');//in here we put the controller claas or it's function

                }
            }
            $errors['email'] = "Wrong email or password";

        }
        $this->view('login/login',[
            'errors' =>$errors,
        ]); 
    }

    function forgotPassword()
    {
      
        $common_user = new common_user();

        $this->view("login/forgotPassword"); //in here put the relevent page name and the path
    }

}
?>
