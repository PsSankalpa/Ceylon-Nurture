<?php

/**
 * make pdf for apoinments
 */
class make_pdf extends Controller
{
    function index($patientid = null, $channelingid = null, $scheduleid = null)
    {
        // code...
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $Auth = new Auth;
        $userid = Auth::userid();
        $data['user']= $userid;
        $data['patient']= $patientid;
        $data['channeling']= $channelingid;
        $data['schedule']= $scheduleid;

         print_r($data);
        // die;

        /*$folder = 'generated_pdfs/';//Creating a new folder
        if(!file_exists($folder))
        {
            mkdir($folder,0777,true); //Creating the directory
        }
        */

        //The current directory which leades to the controller(__DIR__ )
        require_once __DIR__ . '/../models/mpdf/autoload.php';

        $mpdf = new \Mpdf\Mpdf();

        $html = file_get_contents(ROOT.'/appoinment_make_pdf/' .$userid. '/' .$patientid. '/' .$channelingid. '/' .$scheduleid.'/');
        $mpdf->WriteHTML($html);
        $mpdf->Output();//This is use to output everything which is in the screen
    }
}

?>