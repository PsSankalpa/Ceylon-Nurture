<?php
class appointments extends Controller
{
    function index()
    {
      
       $appointments = new appointments();
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }
        
        else{
        $doctors = new doctors();
        $data2 = $doctors->findAll();

         $this->view('doctor/appointments',[
			'row'=>$data2,
		]);//in here put the relevent page name and the path
        
    }
}
}
