<?php
class admin extends Controller
{
    function index()
    {
      
       $admin = new admin();
        //$data = $common_user->findAll();
        $db=new Database();

        $data= $db->query("select * from common_user");
    
        $this->view("admin/admin",['rows'=>$data]); //in here put the relevent page name and the path
        
        
    }

    function addNewUser()
    {
        $errors = array();
        if(count($_POST) > 0)
        {
            $common_user = new common_user();

            if($common_user->validate($_POST))
            {
                
                 
               // $arr['date'] = date("Y-m-d H:i:s");

               
                $common_user->insert($_POST);
                $this->redirect('admin/admin');
            }else
            {
                //errors
               $errors = $common_user->errors;
            }
        }
        
        $this->view('admin/addNewUser',[
           'errors'=>$errors,
        ]);

    }
}
