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
               // $arr['date'] = date("Y-m-d H:i:s");
                
                $common_user->insert($_POST);
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
