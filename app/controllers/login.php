<?php
class login extends Controller
{
    function index()
    {
        //code
        $errors = array();

        if((count($_POST) > 0)&&((Auth::logged_in())||(Auth::logged_in_admin())))
        {
            //$errors='Already Logged In.Please Log out to Login again';
            echo '<script type="text/javascript">  window.onload = function(){
                alert("Please Log out First!");
              }</script>';
            //echo "<script>window.alert('Please Log out First!')</script>";//,['errors' =>$errors, ]);
        }

        if((count($_POST) > 0)&&(!Auth::logged_in())&&(!Auth::logged_in_admin()))
        {
            $common_user = new common_user();
            if($row = $common_user->where('email',$_POST['email']))
            {
                $row = $row[0];
                if(password_verify($_POST['password'], $row->password))
                {

                    Auth::authenticate($row);//creating a class,by putting "::" this run in static mode,from this we authinticate the user
                    $this->redirect('landing/home');//in here we put the controller claas or it's function
                    die;
                }
            }
            

            $admin = new admin();
            if($row = $admin->where('email',$_POST['email']))
            {
                $row = $row[0];
               // print_r($row);
              //  print_r($_POST['email']);
                if($row=$admin->where('password',$_POST['password']))
                {
                    Auth::authenticate2($row);//creating a class,by putting "::" this run in static mode,from this we authinticate the user
                    $this->redirect('admin/admin');//in here we put the controller claas or it's function

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
   /* function password_reset()
    {
      
        //S$common_user = new common_user();
        $password_reset = new password_reset();

        $this->view("password_reset"); //in here put the relevent page name and the path
    }*/
 

    function otpCodeSent()
    {
      
        $common_user = new common_user();

        $this->view("login/otpCodeSent"); //in here put the relevent page name and the path
    }

    function changePassword()
    {
      
        $common_user = new common_user();

        $this->view("login/changePassword"); //in here put the relevent page name and the path
    }


}
?>
