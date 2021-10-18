<?php
class myAccount extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $Auth = new Auth;
        $data = $Auth->finduser();
        
        $sellers = new sellers();
        $doctor = new doctors();
        $patient = new patients();
        $commonUser = new common_user();
        $userid = Auth::userid();
        $data1 = $sellers->where('userid',$userid); 
        $data2 = $doctor->where('userid',$userid);
        $data3 = $patient->where('userid',$userid);
        $data4 = $commonUser->where('userid',$userid);

        if($data1)
        {
            $data1 = $data1[0];
        }
        if($data2)
        {
            $data2 = $data2[0];
        }
        if($data3)
        {
            $data3 = $data3[0];
        }
        if($data4)
        {
            $data4 = $data4[0];
        }


        $this->view('profile/myAccount',[
            'row'=>$data,
            'data1'=>$data1,
            'data2'=>$data2,
            'data3'=>$data3,
            'data4'=>$data4,
        ]);
       
    }

    function editPatient()
    {
        $patient = new patients();
        $userid = Auth::userid();
        $data3 = $patient->where('userid',$userid);
        if($data3)
        {
            $data3 = $data3[0];
        }
        $errors = array();
        if(count($_POST)>0)
        {
            $this->redirect('myAccount');
        }
        $this->view('profile/editPatient',[
			'errors'=>$errors,
            'row'=>$data3,
		]);
    }

    function editDoctor()
    {
        $doctor = new doctors();
        $userid = Auth::userid();
        $data2 = $doctor->where('userid',$userid);
        if($data2)
        {
            $data2 = $data2[0];
        }
        $errors = array();
        if(count($_POST)>0)
        {
            $this->redirect('myAccount');
        }
        $this->view('profile/editDoctor',[
			'errors'=>$errors,
            'row'=>$data2
		]);
    }

    function editSeller()
    {
        $userid = Auth::userid();
        $sellers = new sellers();
        $data1 = $sellers->where('userid',$userid); 

        if($data1)
        {
            $data1 = $data1[0];
        }

        $errors = array();
        if(count($_POST)>0)
        {
            $this->redirect('myAccount');
        }
        $this->view('profile/editSeller',[
			'errors'=>$errors,
            'row'=>$data1,
		]);
    }

    function editCommonUser()
    {
        $commonUser = new common_user();
        $userid = Auth::userid();
        $data4 = $commonUser->where('userid',$userid);
        if($data4)
        {
            $data4 = $data4[0];
        }
        $errors = array();
        if(count($_POST)>0)
        {
            $this->redirect('myAccount');
        }
        $this->view('profile/editCommonUser',[
			'errors'=>$errors,
            'row'=>$data4
		]);
    }
}