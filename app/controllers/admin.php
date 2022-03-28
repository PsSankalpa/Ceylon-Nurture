<?php
class admin extends Controller
{
    function index($adminid = null)
    {
        if (!Auth::logged_in_admin()) {
            $this->redirect('login/login');
        } else {
            $admin = new admin();

            //$adminid = Auth::adminid();
            // print_r($adminid);
            // die;

            // $data2=$admin->where('adminid',$adminid);

            //$data = $common_user->findAll();
            //$db=new Database();

            //$data= $db->query("select * from common_user");
            //$this->load_model('common_user');
            //$data=$common_user->findAll();

            //$this->view("admin/admin");//,['rows'=>$data]); //in here put the relevent page name and the path
            $common_user = new common_user();
            //userid=null
            //$userid=1;
            $data=$common_user->findAll();//where('userid',$userid);

            $appointments= new appointments();
            
            $data1=$appointments->findAll();

            $products = new products();
            $data2=$products->findAll();

        
        
        
        
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
                $cdate[$z] = 0;
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
                $date[$z] = 0;
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
            //print_r(count($details3));

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

            //---------------------------to get forum details---------------------------------------------------------
            $fproducts = new forumproduct();
            $fherbs = new forumherb();
            $fdoctors = new forumdoctor();

            $pfdata1 = $fproducts->findAll();
            $pfdata2 = $fherbs->findAll();
            $pfdata3 = $fdoctors->findAll();

            if($pfdata1 != null){
                $d1 = count($pfdata1);
            }
            else
            {
                $d1 = 0;
            }
            if($pfdata2 != null){
                $d2 = count($pfdata2);
            }
            else
            {
                $d2 = 0;
            }
            if($pfdata3 != null){
                $d3 = count($pfdata3);
            }
            else
            {
                $d3 = 0;
            }
            $forums = array($d1,$d2,$d3);
            // print_r($forums);
            // die;


            $this->view("admin/admin", [
                'rows' => $data,
                'chartdata' => $chartdata,
                'registerdates' => $registerdates,
                'pcommissiondata' => $pcommissiondata,
                'paymentdates' => $paymentdates,
                'donations' => $donations,
                'appointments' => $appointments,
                'cCount' => $cCount,
                'forums' => $forums,
                //'data'=>$data2,
            ]);
        }
    }


        //$Auth = new Auth;
        //$userid=Auth::userid();

        //$data = $Auth->finduser();
        //$Auth = new Auth;
        //  $data = $Auth->findRank();


        // $this->view("admin/admin",['data'=>$data]);

    function channeling(){

        $appointments= new appointments();
        
        $data=$appointments->findAll();

        $this->view("admin/adminChanneling",[
            'row'=>$data,
        ]);
    }


    function payments(){
    

        $admin = new admin();
        $adminpaymentdoctor = new adminPaymentDoctor();
        $row=$adminpaymentdoctor->findAll();

        $adminpayment= new adminPayment();
        $row2=$adminpayment->findAll();

        $this->view("admin/adminpayments",[
                'row'=>$row,
                'row1'=>$row2,
        ]);


    }

    function adminPayment(){

        if(!Auth::logged_in_admin())  
        {
          $this->redirect('login/login');
        }
        else
        {

            $adminid=Auth::userid();

            if(count($_POST) > 0)
            {
                $arr['type'] = $_POST['type'];
                $arr['amount'] = $_POST['amount'];
                $arr['date'] = date("Y-m-d H:i:s");

                $adminpayment = new adminPayment();
                $adminpayment->insert($arr); 
                $this->redirect('admin/payments');
            }

            $this->view("admin/adminpayment");
        }
    }

    function adminPaymentDoctor(){

        if(!Auth::logged_in_admin())  
        {
          $this->redirect('login/login');
        }
        else
        {

        $doctors = new doctors();
        $common_user = new common_user();
        $doctorids=$doctors->findAll();

        foreach($doctorids as $doctorid){
        $doctoridarray=$doctorid->userid;
        $array[]=$doctoridarray;
        
        }
        //print_r($array);
        // foreach($doctoridarray as $doctorid){
        // $data=$common_user->where('userid',$doctorid);

        // }


        if(count($_POST) > 0){

        $arr['doctorName'] = $_POST['name'];
        $arr['amount'] = $_POST['amount'];
        $arr['date'] = date("Y-m-d H:i:s");
        $name = $_POST['name'];

        $common_user = new common_user();
        $doctoridrow=$common_user->where('username',$name);
        $doctorid=$doctoridrow[0]->userid;
        $doctorchargerow=$doctors->where('userid',$doctorid);
        $doctorcharge=$doctorchargerow->doctorCharge;
        //print_r($doctorcharge);
        $arr['doctorid'] = $doctorid;

        $adminpaymentdoctor = new adminPaymentdoctor();
        $adminpaymentdoctor->insert($arr); 
        $this->redirect('admin/payments');
 
        }

        $this->view("admin/adminPaymentDoctor",[
            'row'=>$array,
        ]);
    }

    }



    function feedbacks(){

        $patientrate = new patientrate();
        $row=$patientrate->findAll();
        $this->view("admin/adminFeedbacks",[
            'row'=>$row,
        ]);
    }

    function reports(){
        $products=new products;

        $data=$products->findAll();
        $data1=NULL;
        $data3=NULL;

        $appointments = new appointments();
        $data2=$appointments->findAll();

        if(count($_POST)>0){

            

        if(isset($_POST['name'])){

        $name = '%' . $_POST['name'] . '%';;

        $query= "select * from appointments where patientName like :name order by appointmentid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
        $arr['name'] = $name; //to pass to the query function
        $data1 = $appointments->query($query, $arr);
        }

        if(isset($_POST['productName'])){

            $productName = '%' . $_POST['productName'] . '%';;

        $query= "select * from products where productName like :productName order by productid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
        $arr['productName'] = $productName; //to pass to the query function
        $data3 = $appointments->query($query, $arr);
        }
        }

        $adminpaymentdoctor = new adminPaymentDoctor();
        $data4=$adminpaymentdoctor->findAll();

        $adminpayment= new adminPayment();
        $data5=$adminpayment->findAll();



        $this->view("admin/adminReports",[
            'rows'=>$data,
            'rows1'=>$data1,
            'rows2'=>$data2,
            'rows3'=>$data3,
            'rows4'=>$data4,
            'rows5'=>$data5,



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

    public function generatepdfChanneling($id)
    {
        $appointments = new appointments();
        //$useridrow=$appointments->where('appointmentid',$id);
        //print_r($useridrow);

        //$userid = $useridrow[0]->patientid;
        //print_r($userid);
        require_once __DIR__ . '/../models/mpdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $html = file_get_contents(ROOT . '/admin/channelingpdf/' . $id  );
        //   print_r($html);
        //    die;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function channelingpdf($id)
    {
        $appointments = new appointments();

        $row=$appointments->where('appointmentid',$id);
        // print_r($row);
        // die;
        //$row1=$appointments->where('appointmentid',$id);
        //$date=$row1->slotTimeStart;



        if ($row != null) {
            $row=$row[0];
        }

       
?>

        <style>
            th,
            td {
                text-align: left;
                padding: 16px;
            }

            .title2 {
                width: 95%;
                text-align: center;
            }
        </style>

        <div class="title1" style="width: 95%;">
            <div class="logo" style="width: 100%;text-align: center;"><img src="<?= ASSETS ?>img/logo.png" style="width: 30%;align-items: center;"></div>
            <div class="mtitle" style="width: 100%;text-align: center;">
                <h1>Ceylon Nuture</h1>
            </div>
        </div>
        <hr>
        <div class="title2">
            <h2>Channeling Details</h2>
        </div>
        <table style="border-collapse: collapse;border-spacing: 0;width: 85%;border: 1px solid #ddd;margin: 5% auto;">
            <tr>
                <td>Name of the Doctor</td>
                <td>:</td>
                <td><?= $row->doctorName ?></td>
            </tr>
            <tr>
                <td>Patient Name</td>
                <td>:</td>
                <td><?= $row->patientName ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?= $row->date ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td>:</td>
                <td>Rs:<?= $row->nic ?></td>
            </tr>
            <tr>
                <td>Total Payment</td>
                <td>:</td>
                <td><?= $row->totalPayment ?></td>
            </tr>
        </table>

<?php
    }

    public function generatepdfProducts($id)
    {
        require_once __DIR__ . '/../models/mpdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $html = file_get_contents(ROOT . '/admin/productpdf/' . $id );
        //  print_r($html);
        //  die;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function productpdf($id)
    {
        $products = new products();

        $row=$products->where('productid',$id);
        //$row1=$appointments->where('appointmentid',$id);
        //$date=$row1->slotTimeStart;



        if ($row != null) {
            $row=$row[0];
        }

       
?>

        <style>
            th,
            td {
                text-align: left;
                padding: 16px;
            }

            .title2 {
                width: 95%;
                text-align: center;
            }
        </style>

        <div class="title1" style="width: 95%;">
            <div class="logo" style="width: 100%;text-align: center;"><img src="<?= ASSETS ?>img/logo.png" style="width: 30%;align-items: center;"></div>
            <div class="mtitle" style="width: 100%;text-align: center;">
                <h1>Ceylon Nuture</h1>
            </div>
        </div>
        <hr>
        <div class="title2">
            <h2>Channeling Details</h2>
        </div>
        <table style="border-collapse: collapse;border-spacing: 0;width: 85%;border: 1px solid #ddd;margin: 5% auto;">
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><?= $row->productName ?></td>
            </tr>
            <tr>
                <td>Seller Name</td>
                <td>:</td>
                <td><?= $row->sellerName ?></td>
            </tr>
            <tr>
                <td>category</td>
                <td>:</td>
                <td><?= $row->category ?></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>:</td>
                <td>Rs:<?= $row->productPrice ?></td>
            </tr>
            <tr>
                <td>Telephone Number</td>
                <td>:</td>
                <td><?= $row->tpNumber ?></td>
            </tr>
        </table>

<?php
    }

    public function generatepdfDoctorPayment($id)
    {
        require_once __DIR__ . '/../models/mpdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $html = file_get_contents(ROOT . '/admin/doctorPaymentpdf/' . $id );
        //  print_r($html);
        //  die;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function doctorPaymentpdf($id)
    {
        $adminpaymentDoctor = new adminPaymentDoctor();

        $row=$adminpaymentDoctor->where('adminpaymentid',$id);
        //$row1=$appointments->where('appointmentid',$id);
        //$date=$row1->slotTimeStart;



        if ($row != null) {
            $row=$row[0];
        }

       
?>

        <style>
            th,
            td {
                text-align: left;
                padding: 16px;
            }

            .title2 {
                width: 95%;
                text-align: center;
            }
        </style>

        <div class="title1" style="width: 95%;">
            <div class="logo" style="width: 100%;text-align: center;"><img src="<?= ASSETS ?>img/logo.png" style="width: 30%;align-items: center;"></div>
            <div class="mtitle" style="width: 100%;text-align: center;">
                <h1>Ceylon Nuture</h1>
            </div>
        </div>
        <hr>
        <div class="title2">
            <h2>Channeling Details</h2>
        </div>
        <table style="border-collapse: collapse;border-spacing: 0;width: 85%;border: 1px solid #ddd;margin: 5% auto;">
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><?= $row->productName ?></td>
            </tr>
            <tr>
                <td>Seller Name</td>
                <td>:</td>
                <td><?= $row->sellerName ?></td>
            </tr>
            <tr>
                <td>category</td>
                <td>:</td>
                <td><?= $row->category ?></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>:</td>
                <td>Rs:<?= $row->productPrice ?></td>
            </tr>
            <tr>
                <td>Telephone Number</td>
                <td>:</td>
                <td><?= $row->tpNumber ?></td>
            </tr>
        </table>

<?php
    }

}