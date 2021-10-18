<?php
class admin extends Controller
{
    function index()
    {
        if(!Auth::logged_in_admin())  
        {
          $this->redirect('login/login');
        }
        else
        {
            $admin = new admin();
       
        //$data = $common_user->findAll();
        //$db=new Database();

        //$data= $db->query("select * from common_user");
       //$this->load_model('common_user');
        //$data=$common_user->findAll();

       // $data=$common_user->where('fname','cham');
    
        //$common_user->insert($data);
        //$common_user->update(id,$data);
        //$common_user->delete(id);

        //$this->view("admin/admin");//,['rows'=>$data]); //in here put the relevent page name and the path
        $common_user = new common_user();
        //userid=null
        $userid=1;
        $data=$common_user->where('userid',$userid);
        
        $this->view("admin/admin",['rows'=>$data]);
        }
        

        //$Auth = new Auth;
        //$userid=Auth::userid();

        //$data = $Auth->finduser();
        $this->view("admin/admin",['data'=>$data]);


        
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

   /* function findUser($userid=null)
    {
        $common_user = new common_user();
        $userid=1;
        $data=$common_user->where('userid',$userid);
        
        $this->view("admin/admin",['rows'=>$data]);
    }*/
}
