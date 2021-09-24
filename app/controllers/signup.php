<?php
class signup extends Controller
{
    function index()//we can take the values in the url in by this way
    {
        //$db = new database();
        //$data['results'] = $db->read("Select * from images");

        //$image_class = $this->loadModel("image_class");//load the relevant model
        //utilize the above loaded model here
        $errors = array();
        if(count($_POST) > 0)
        {
            $user = new User();

            if($user->validate($_POST))
            {
                $arr['fname'] = $_POST['fname'];
                $arr['lname'] = $_POST['lname'];
                $arr['username'] = $_POST['username'];
                $arr['email'] = $_POST['email'];
                $arr['tpNumber'] = $_POST['tpNumber'];
                $arr['password'] = $_POST['password'];
                $arr['date'] = date("Y-m-d H:i:s");
               
                $user->insert($arr);
                $this->redirect('login');
            }else
            {
                //errors
                $errors = $user->errors;

            }
        }
        $this->view("signup",[
            'errors'=>$errors,
        ]); //in here put the relevent page name and the path
    }
}
?>
