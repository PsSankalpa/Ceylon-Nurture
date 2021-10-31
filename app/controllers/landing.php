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
          $article = new article();
          $data2 = $article->findAll();
          
          $this->view('home',[
			    'data'=>$data,
          'rows' => $data2,
        ]);
      }
      else{
        $article = new article();
        $data2 = $article->findAll();
        $this->view('home',[
          'rows' => $data2,
        ]);
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
