<?php
class home extends Controller
{
    function index()
    {
      
    //if(!Auth::logged_in())
       //{
         //  $this->redirect();

      // }
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
    
            $seller = new sellers();
            $doctor = new doctors();
            $patient = new patients();
            $userid = Auth::userid();

            //sellerid
            if(!empty($row = $seller->where('userid',$userid) ))
            {
               $row = $row[0];
               $sellerid = $row->userid;
            }
            else{
               $sellerid = "";
            }

            //dotctorid
            if(!empty($row2 = $doctor->where('userid',$userid) ))
            {
               $row2 = $row2[0];
               $doctorid = $row2->userid;
            }
            else{
               $doctorid = "";
            }

            //patientid
            if(!empty($row3 = $patient->where('userid',$userid) ))
            {
               $row3 = $row3[0];
               $patientid = $row3->userid;
            }
            else{
               $patientid = "";
            }

            $data ="none";
            $Auth = new Auth;
            $data = $Auth->finduser($sellerid,$doctorid,$patientid,$userid);
            
            $this->view('home2',[
			    'data'=>$data,
            
		    ]); //in here put the relevent page name and the path
        }

        function findUser()
        {

        }

}
?>
