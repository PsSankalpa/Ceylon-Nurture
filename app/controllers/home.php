<?php
class home extends Controller
{
    function index()
    {
      
    //if(!Auth::logged_in())
       //{
         //  $this->redirect();

      // }

        $common_user = new common_user();
        $this->view('home',[
        
        ]);
    }

    function home2()
    {
      
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
    
           $common_user = new common_user();
            $data = $common_user->findAll();
    
            $data ="none";
            $Auth = new Auth;
            $data = $Auth->finduser();
            $this->view('home2',[
			    'data'=>$data,
            
		    ]); //in here put the relevent page name and the path
        }

        function findUser()
        {

        }

}
?>
