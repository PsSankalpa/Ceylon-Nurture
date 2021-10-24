<?php

class forum extends Controller
{
    function index()
    {
        $forumdoctor = new forumdoctor();
        //$data =$forumdoctor->where('forumDoctorid',$forumDoctorid);
        
        $data=$forumdoctor->findAll();
        
        //print_r($data);
    
        $this->view("forums/forum",['rows'=>$data]);
    
        
        $this->view("forums/forum");  
    
    }

    function addForumDoctor(){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }


        $errors = array();
        if(count($_POST) > 0)
        {

            $forumdoctor = new forumdoctor();

            if($forumdoctor->validate($_POST))
            {
                
               print_r($forumdoctor);  
               // $arr['date'] = date("Y-m-d H:i:s");

               
                $forumdoctor->insert($_POST);
                $this->redirect('forum');
            }else
            {
                //errors
               $errors = $forumdoctor->errors;
            }
        }
        

        $this->view("forums/addForumDoctor",[
            'errors'=>$errors,
         ]);

        
    }

    function updateForumDoctor($forumDoctorid=null){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }

        $forumdoctor = new forumdoctor();

		$errors = array();
		if(count($_POST) > 0 )
 		{

			if($forumdoctor->validate($_POST))
 			{
 				
 				$forumdoctor->update($forumDoctorid,$_POST);
 				$this->redirect('forum');
 			}else
 			{
 				//errors
 				$errors = $forumdoctor->errors;
 			}
 		}

 		$row = $forumdoctor->where('forumDoctorid',$forumDoctorid);


        $this->view("forums/updateForumDoctor",[
            'row'=>$row,
            'errors'=>$errors,
        ]);
    }

    function deleteForumDoctor($forumDoctorid=null){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }

        $forumdoctor = new forumdoctor();


		if(count($_POST) > 0 )
 		{
 
 			$forumdoctor->delete($forumDoctorid);
 			$this->redirect('forum');
 		 
 		}

 		$row = $forumdoctor->where('forumDoctorid',$forumDoctorid);

			$this->view("forums/deleteForumDoctor",[
				'row'=>$row,
			]);
		


    }

}