<?php
class landing extends Controller
{
    function index()
    {
      
    //if(!Auth::logged_in())
       //{
         //  $this->redirect();

      // }
      if(Auth::logged_in()){
      $Auth = new Auth;
          $data = $Auth->finduser();
           
          
          $this->view('home',[
			    'data'=>$data,
        ]);
      }
      else{
        $this->view('home');
      }      
    
     

    }

    /*function home()
    {
      
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

            $Auth = new Auth;
            $data = $Auth->finduser();
            
            $this->view('home',[
			    'data'=>$data,
            
		    ]); //in here put the relevent page name and the path
        }

        function findUser()
        {

        }*/

}
?>
