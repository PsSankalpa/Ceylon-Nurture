<?php

class forum extends Controller
{
    function index()
    {
        $forumdoctor = new forumdoctor();
        //$data =$forumdoctor->where('forumDoctorid',$forumDoctorid);
        
        $data=$forumdoctor->findAll();

        $forumherb = new forumherb();
        $data1= $forumherb->findAll();

        $forumproduct = new forumproduct();
        $data2= $forumproduct->findAll();


        $userid = Auth::userid();
        $doctors = new doctors;
        $data3=$doctors->where('userid',$userid);
        
        //print_r($data);
    
        $this->view("forums/forum",[
            'rows'=>$data,
            'rows1'=>$data1,
            'rows2'=>$data2,
            'rows3'=>$data3,


        
        ]);
    
        
    
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

    function addForumProduct(){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }


        $errors = array();
        if(count($_POST) > 0)
        {
            $forumproduct = new forumproduct();

            if($forumproduct->validate($_POST,$_FILES))
            {

                global $des;
                $arr['userid'] = Auth::userid();
                $arr['name'] = htmlspecialchars($_POST['name']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['image'] = $des;
                $arr['date'] = date("Y-m-d H:i:s");

               
                $forumproduct->insert($arr);
                $this->redirect('forum');
            }else
            {
                //errors
               $errors = $forumproduct->errors;
            }
        }
        

        $this->view("forums/addForumProduct",[
            'errors'=>$errors,
         ]);

        
    }

    function updateForumProduct($forumProductid=null){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }

        $forumproduct = new forumproduct();

		$errors = array();
		if(count($_POST) > 0 )
 		{

			if($forumproduct->validate($_POST))
 			{
 				
 				$forumproduct->update($forumProductid,$_POST);
 				$this->redirect('forum');
 			}else
 			{
 				//errors
 				$errors = $forumproduct->errors;
 			}
 		}

 		$row = $forumproduct->where('forumProductid',$forumProductid);


        $this->view("forums/updateForumProduct",[
            'row'=>$row,
            'errors'=>$errors,
        ]);
    }

    function deleteForumProduct($forumProductid=null){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }

        $forumproduct = new forumproduct();


		if(count($_POST) > 0 )
 		{
 
 			$forumproduct->delete($forumProductid);
 			$this->redirect('forum');
 		 
 		}

 		$row = $forumproduct->where('forumProductid',$forumProductid);

			$this->view("forums/deleteForumProduct",[
				'row'=>$row,
			]);
		


    }

    function addForumHerb(){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }


        $errors = array();
        if(count($_POST) > 0)
        {
            $forumherb = new forumherb();

            if($forumherb->validate($_POST,$_FILES))
            {
                
               $arr['date'] = date("Y-m-d H:i:s");

               global $des;

               $arr['userid'] = Auth::userid();
               $arr['name'] = htmlspecialchars($_POST['name']);
               $arr['description'] = htmlspecialchars($_POST['description']);
               $arr['image'] = $des;
               
                $forumherb->insert($arr);
                $this->redirect('forum');
            }else
            {
                //errors
               $errors = $forumherb->errors;
            }
        }
        

        $this->view("forums/addForumHerb",[
            'errors'=>$errors,
         ]);

        
    }

    function updateForumHerb($forumHerbid=null){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }

        $forumherb = new forumherb();

		$errors = array();
		if(count($_POST) > 0 )
 		{

			if($forumherb->validate($_POST))
 			{
 				
 				$forumherb->update($forumHerbid,$_POST);
 				$this->redirect('forum');
 			}else
 			{
 				//errors
 				$errors = $forumherb->errors;
 			}
 		}

 		$row = $forumdoctor->where('forumHerbid',$forumHerbid);


        $this->view("forums/updateForumHerb",[
            'row'=>$row,
            'errors'=>$errors,
        ]);
    }

    function deleteForumHerb($forumHerbid=null){

        if(!((Auth::logged_in()) || (Auth::logged_in_admin()) ))
        {
         $this->redirect('login/login');
        }

        $forumherb = new forumherb();


		if(count($_POST) > 0 )
 		{
 
 			$forumherb->delete($forumHerbid);
 			$this->redirect('forum');
 		 
 		}

 		$row = $forumdoctor->where('forumHerbid',$forumHerbid);

			$this->view("forums/deleteForumHerb",[
				'row'=>$row,
			]);
		


    }

    function get_destination($destination)
    {
        global $des;
        $des =$destination;
        return $des;
    }

}