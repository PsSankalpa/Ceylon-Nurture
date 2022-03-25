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

    function editDoctor($userid = null)
    {
        $userid = Auth::userid();
        $errors = array();
        $doctor = new doctors();
        
        $data2 = $doctor->where('userid',$userid); 
        //print_r($data2);
        

        if($data2)
        {
            $data2 = $data2[0];
        }
        //print_r($data2);
        $errors = array();
        if (count($_POST) > 0) 
        {
            
            if ($doctor->validate($_POST, $_FILES)) 
            {
                print_r($data2);
                die;
               
                global $des;
                //global $des2;
                $arr['userid'] = AUTH::userid();
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['dob'] = htmlspecialchars($_POST['dob']);
                $arr['registrationNumber'] = $_POST['registrationNumber'];
                $arr['specialities'] = $_POST['specialities'];
                $arr['hospital'] = $_POST['hospital'];
                $arr['city'] = $_POST['city'];
                $arr['address'] = $_POST['address'];
                $arr['image'] = $des; 

            $doctor->update($userid, $arr);   
            print_r($arr);  
            

            $this->redirect('myAccount');
            } else {
             $errors = $doctor->errors;
            }
        }
        $row = $doctor->where('userid', $userid);
            
        if ($row) {
            $row = $row[0];
            if (file_exists($row->image)) {
                unlink($row->image);
            }
        }
        $this->view('profile/editDoctor',[
			'errors'=>$errors,
            'row'=>$data2,
		]);
    }

    function deleteAccount($userid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $errors = array();
        $doctors = new doctors();


        if (count($_POST) > 0) {
            //print_r($data);
            //die;
            $doctors->delete($userid);
            $this->redirect('doctor/viewAccount');
        }
        $row = $doctors->where('userid', $userid);
        //$data2 = $doctors->findAll();
        if ($row) {
            $row = $row[0];
            unlink($row->image);
        }
        $doctorid = Auth::userid();
        $doctors = new doctors();
        $data = $doctors->where('userid', $doctorid);
        $this->view('doctor/deleteAccount', [
            'row' => $row,
            'data' => $data,
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