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

        $forumreplydoctor = new forumreplydoctor();
        $forumreplyherb = new forumreplyherb();
        $forumreplyproduct = new forumreplyproduct();

        
        // $newest = "SELECT TOP 10 * FROM forumdoctor ORDER BY forumDoctorid DESC";

        // $newestrow = $forumdoctor->query($newest);


        // if($newestrow){
        //     $data = $newestrow;
        // }

        // if(isset($_GET['search'])){}

        if(count($_POST) > 0 ){

            if(isset($_POST['reply1'])){

            $arr['forumDoctorid'] = htmlspecialchars($_POST['doctorid']);
            $arr['reply'] = htmlspecialchars($_POST['reply1']);
            $arr['userid'] = $userid;

            $forumreplydoctor->insert($arr);
            

            $this->redirect('forum');
        }

        if(isset($_POST['reply2'])){

            $arr['forumHerbid'] = htmlspecialchars($_POST['herbid']);
            $arr['reply'] = htmlspecialchars($_POST['reply2']);
            $arr['userid'] = $userid;

            $forumreplydoctor->insert($arr);
            

            $this->redirect('forum');
        }

        if(isset($_POST['reply3'])){

            $arr['forumProductid'] = htmlspecialchars($_POST['productid']);
            $arr['reply'] = htmlspecialchars($_POST['reply3']);
            $arr['userid'] = $userid;

            $forumreplyproduct->insert($arr);
            

            $this->redirect('forum');
        }


        }

       




        
        //print_r($data);
    
        $this->view("forums/forum",[
            'rows'=>$data,
            'rows1'=>$data1,
            'rows2'=>$data2,
            'rows3'=>$data3,



        
        ]);
    
        
    
    }

    function verification($forumHerbid){

            $userid = Auth::userid();
            //print_r($userid);
            $arr['verifiedDoctorid']=$userid;

            $doctors = new doctors;
            $data=$doctors->where('userid',$userid);
            
            $arr['verifiedDoctorName']=$data[0]->nameWithInitials;
            $arr['verification']=TRUE;
            $arr['VerifiedDate'] = date("Y-m-d H:i:s");


            $forumherb = new forumherb;
            $forumherb->update($forumHerbid,$arr);

            $this->view("forums/verified");

        





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
               $arr['userid'] = Auth::userid();
               $arr['name'] = htmlspecialchars($_POST['name']);
               $arr['description'] = htmlspecialchars($_POST['description']);
               $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
               $arr['location'] = htmlspecialchars($_POST['location']);
               $arr['date'] = date("Y-m-d H:i:s");
               
                $forumdoctor->insert($arr);
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
        $userName = Auth::username();
        

		if(count($_POST) > 0 )
 		{

			if($forumproduct->validate2($_POST,$_FILES,$dest=NULL,$forumProductid,$userName))
 			{
                global $des;
                $arr['name'] = htmlspecialchars($_POST['name']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['image'] =$des;
 				
 				$forumproduct->update($forumProductid,$arr);
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
               $arr['verification']=FALSE;

               
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
        $userName = Auth::username();

		$errors = array();
		if(count($_POST) > 0 )
 		{

			if($forumherb->validate2($_POST,$_FILES,$dest=NULL,$forumHerbid,$userName))
 			{
                global $des;
                $arr['name'] = htmlspecialchars($_POST['name']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['image'] =$des;
 				
 				$forumherb->update($forumHerbid,$arr);
 				$this->redirect('forum');
 			}else
 			{
 				//errors
 				$errors = $forumherb->errors;
 			}
 		}

 		$row = $forumherb->where('forumHerbid',$forumHerbid);


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

 		$row = $forumherb->where('forumHerbid',$forumHerbid);

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