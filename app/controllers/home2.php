<?php
class home2 extends Controller
{
    function index()
    {
      
    //if(!Auth::logged_in())
       //{
         //  $this->redirect();

      // }

       $common_user = new common_user();
        $data = $common_user->findAll();

        $this->view("home2",$data); //in here put the relevent page name and the path
    }
}
?>
