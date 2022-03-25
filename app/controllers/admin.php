<?php
class admin extends Controller
{
    function index($adminid = null)
    {
        if (!Auth::logged_in_admin()) {
            $this->redirect('login/login');
        } else {
            $admin = new admin();

            // $data2=$admin->where('adminid',$adminid);

            //$data = $common_user->findAll();
            //$db=new Database();

            //$data= $db->query("select * from common_user");
            //$this->load_model('common_user');
            //$data=$common_user->findAll();

            // $data=$common_user->where('fname','cham');

            //$common_user->insert($data);
            //$common_user->update(id,$data);
            //$common_user->delete(id);

            //$this->view("admin/admin");//,['rows'=>$data]); //in here put the relevent page name and the path
            $common_user = new common_user();
            //userid=null
            //$userid=1;


            $data = $common_user->findAll(); //where('userid',$userid);
            $cCount = count($data);

            //--------------------------------getting data for charts-------------------------------------------------------------------

            //-----------------------getting user count monthlyvise----------------------------------------------------

            $donations = array();
            $cmonth = array();
            $ccount = array();
            $registerdates = array();
            //for the range of month data
            $commonUser = new common_user();

            $details0 = $commonUser->findAll();
            //print_r(count($details0));

            for ($z = 0; $z < 4; $z++) {

                $cmonth[$z] = $commonUser->getrange($z, 'MONTH');
                $ccount[$z] = 0;
                if (($cmonth[$z]) != null) {
                    $cdate[$z] = date('Y/m', strtotime($cmonth[$z][0]->date));
                    for ($j = 0; $j < count($cmonth[$z]); $j++) {
                        if (isset($cmonth[$z][$j]->userid)) {
                            $ccount[$z] = $ccount[$z] + 1;
                        }
                    }
                }
            }


            // print_r($dcount[3]);
            // print_r($cmonth[0]);
            $chartdata = array($ccount[3], $ccount[2], $ccount[1], $ccount[0]);
            $registerdates = array($cdate[3], $cdate[2], $cdate[1], $cdate[0]);

            //-------------------end of getting user count monthlyvise----------------------

            //----------------------------------------------------------------------------------------------------

            //-----------------------getting product payment details monthlyvise----------------------------------------------------
            $pcommissiondata = array();
            $paymentdates = array();
            $month = array();
            $count = array();
            //for the range of month data
            $commission = new productcommission();

            $details1 = $commission->findAll();
            //print_r(count($details1));

            for ($z = 0; $z < 4; $z++) {

                $month[$z] = $commission->getrange($z, 'MONTH');
                $count[$z] = 0;
                if (($month[$z]) != null) {
                    $date[$z] = date('Y/m', strtotime($month[$z][0]->date));
                    for ($j = 0; $j < count($month[$z]); $j++) {
                        if (isset($month[$z][$j]->amount)) {
                            $count[$z] = $count[$z] + $month[$z][$j]->amount;
                        }
                    }
                }
            }

            //print_r($month[0]);
            $pcommissiondata = array($count[3], $count[2], $count[1], $count[0]);
            $paymentdates = array($date[3], $date[2], $date[1], $date[0]);
            //-------------------------------end of getting product payment details monthlyvise-------------------------------


            //-----------------------getting donation payment details monthlyvise----------------------------------------------------

            $donations = array();
            $dmonth = array();
            $dcount = array();
            //for the range of month data
            $dcommission = new donations();

            $details2 = $dcommission->findAll();
            //print_r(count($details2));

            for ($z = 0; $z < 4; $z++) {

                $dmonth[$z] = $dcommission->getrange($z, 'MONTH');
                $dcount[$z] = 0;
                if (($dmonth[$z]) != null) {
                    $ddate[$z] = $dmonth[$z][0]->date;
                    for ($j = 0; $j < count($dmonth[$z]); $j++) {
                        if (isset($dmonth[$z][$j]->amount)) {
                            $dcount[$z] = $dcount[$z] + $dmonth[$z][$j]->amount;
                        }
                    }
                }
            }


            // print_r($dcount[3]);
            // print_r($dmonth[0]);
            $donations = array($dcount[3], $dcount[2], $dcount[1], $dcount[0]);

            //-------------------end of getting donation payment details monthlyvise----------------------

            //-----------------------getting appointmen payment details monthlyvise----------------------------------------------------

            $appointments = array();
            $amonth = array();
            $acount = array();
            //for the range of month data
            $patients = new patientpayment();

            $details3 = $patients->findAll();
            print_r(count($details3));

            for ($z = 0; $z < 4; $z++) {

                $amonth[$z] = $patients->getrange($z, 'MONTH');
                $acount[$z] = 0;
                if (($amonth[$z]) != null) {
                    $adate[$z] = $amonth[$z][0]->date;
                    for ($j = 0; $j < count($amonth[$z]); $j++) {
                        if (isset($amonth[$z][$j]->totalPayment)) {
                            $acount[$z] = $acount[$z] + $amonth[$z][$j]->totalPayment;
                        }
                    }
                }
            }


            // print_r($dcount[3]);
            // print_r($dmonth[0]);
            $appointments = array($acount[3], $acount[2], $acount[1], $acount[0]);
            // print_r($appointments);
            // die;

            //-------------------end of getting appointment payment details monthlyvise----------------------




            $this->view("admin/admin", [
                'rows' => $data,
                'chartdata' => $chartdata,
                'registerdates' => $registerdates,
                'pcommissiondata' => $pcommissiondata,
                'paymentdates' => $paymentdates,
                'donations' => $donations,
                'appointments' => $appointments,
                'cCount'=> $cCount,
                //'data'=>$data2,
            ]);
        }


        //$Auth = new Auth;
        //$userid=Auth::userid();

        //$data = $Auth->finduser();
        //$Auth = new Auth;
        //  $data = $Auth->findRank();


        // $this->view("admin/admin",['data'=>$data]);



    }

    function channeling()
    {

        $this->view("admin/adminChanneling");
    }

    function payments()
    {

        $this->view("admin/adminpayments");
    }

    function feedbacks()
    {

        $this->view("admin/adminFeedbacks");
    }

    function reports()
    {
        $products = new products;

        $data = $products->findAll();
        $this->view(
            "admin/adminReports",
            [
                'rows' => $data,
            ]
        );
    }

    function products()
    {
        $products = new products;

        $data = $products->findAll(); //where('userid',$userid);
        $this->view("admin/adminProducts", [
            'rows' => $data,
        ]);
    }

    function users($userid = null)
    {

        //to get the user count
        $sellers = new sellers();
        $data2 = $sellers->findAll();
        $doctor = new doctors();
        $data3 = $doctor->findAll();
        $commonUser = new common_user();
        $data4 = $commonUser->findAll();
        $patient = new patients();
        $data5 = $patient->findAll();

        $uCount['sellers'] = count($data2);
        $uCount['doctors'] = count($data3);
        $uCount['commonusers'] = count($data4);
        $uCount['patients'] = count($data5);

        // print_r($uCount['doctors']);
        // die;

        $common_user = new common_user();
        //userid=null
        //$userid=1;
        $data = $common_user->findAll(); //where('userid',$userid);

        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            //side that we put % mark it ignore exact matching
            if ($search == 'commonuser') {
                $data = $common_user->findAll();
            } elseif ($search == 'sellers') {
                $query = "select * from common_user where userid in (select userid from sellers)";
                $data = $common_user->query($query);
            } elseif ($search == 'patients') {
                $query = "select * from common_user where userid in (select userid from patients)";
                $data = $common_user->query($query);
            } elseif ($search == 'doctors') {
                $query = "select * from common_user where userid in (select userid from doctors)";
                $data = $common_user->query($query);
            }
        }

        $row = $common_user->where('userid', $userid);
        if ($row) {
            $row = $row[0];
        }

        $this->view("admin/adminUsers", [
            'rows' => $data,
            'row' => $row,
            'uCount' => $uCount,
        ]);
    }

    function add()
    {
        $errors = array();
        if (count($_POST) > 0) {
            //show($POST);

            $common_user = new common_user();
            if ($common_user->validate($_POST)) {


                // $arr['date'] = date("Y-m-d H:i:s");


                $common_user->insert($_POST);
                $this->redirect('admin/users');
            } else {
                //errors
                $errors = $common_user->errors;
            }
        }

        $this->view('admin/adminAddUser', [
            'errors' => $errors,
        ]);
    }

    function update($userid = null)
    {
        $common_user = new common_user();
        $userid = trim($userid == '') ? Auth::getUser_id() : $userid;

        $errors = array();
        if (count($_POST) > 0) {
            //if(trim($_POST['password']) == "")
            //{
            //    unset($_POST['password']);
            //    unset($_POST['password2']);

            //}

            if ($common_user->validate($_POST, $userid)) {


                // $arr['date'] = date("Y-m-d H:i:s");


                $common_user->update($userid, $_POST);
                $this->redirect('admin/users');
            } else {
                //errors
                $errors = $common_user->errors;
            }
        }
        $row = $common_user->where('userid', $userid);
        if ($row) {
            $row = $row[0];
        }
        $this->view('admin/adminUpdateUser', [
            'row' => $row,
            'errors' => $errors,
        ]);
    }

    function delete($userid = null)
    {
        $common_user = new common_user();
        $userid = trim($userid == '') ? Auth::getUser_id() : $userid;


        if (count($_POST) > 0) {

            $common_user->delete($userid);
            $this->redirect('admin/users');
        }

        $row = $common_user->where('userid', $userid);
        if ($row) {
            $row = $row[0];
        }

        $this->view('admin/adminDeleteUser', [
            'row' => $row,

        ]);
    }








    /* function findUser($userid=null)
    {
        $common_user = new common_user();
        $userid=1;
        $data=$common_user->where('userid',$userid);
        
        $this->view("admin/admin",['rows'=>$data]);
    }*/

    /*public function findRank()
    {
        foreach ($rows as $row):

        $seller = new sellers();
        $doctor = new doctors();
        $patient = new patients();

        $userid = $row->userid;

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
        
        $userid = $_SESSION['COMMON_USER']->userid;

        
        $data="none";

        if(isset($_SESSION['COMMON_USER']))
        {
            if($sellerid == $userid )
            {
                $data = "seller";
            }
            if($doctorid == $userid)
            {
                $data = "doctor";
            }
            if($patientid == $userid)
            {
                $data = "patient";
            }
            if( ($doctorid == $userid) &&($sellerid == $userid ))
            {
                $data = "doctorAndSeller";
            }
            if( ($doctorid == $userid )&& ($patientid == $userid ))
            {
                $data = "doctorAndPatient";
            }
            if( ($sellerid == $userid) && ($patientid == $userid ))
            {
                $data = "sellerAndPatient";
            }
            if(($sellerid == $userid)&& ($patientid == $userid)&& ($doctorid == $userid))
            {
                $data = "allUser";
            }
            
            return $data;
        }
        endforeach;

    }*/
}
