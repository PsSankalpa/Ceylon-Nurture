<?php
class contactus extends Controller
{
    function index()//we can take the values in the url in by this way
    {
        // code
        if(count($_POST) > 0)
        {
            $contactus = new contactus();
           // print_r($_POST);
          
            if($_POST)
            {
                
               // $arr['date'] = date("Y-m-d H:i:s");
                $arr['fullname'] = htmlspecialchars($_POST['fullname']);
                $arr['email'] = htmlspecialchars($_POST['email']);
                $arr['message'] = htmlspecialchars($_POST['message']);
                //print_r($arr);
                //die;
                $contactus->insert($_POST);
               // print_r($_POST);
               // die;
                $this->redirect('landing/home');
            }else
            {
            }
        }
        
        $this->view('home',[

        ]);
    }
}

?>
