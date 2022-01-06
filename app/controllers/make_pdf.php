<?php
/**
 * make pdf
 */
class make_pdf extends Controller
{
    function index()
    {
        // code...
        if(!Auth::logged_in())
        {
            $this->redirect('login/login');
        }
        $folder = 'generated_pdfs/';//Creating a new folder
        if(!file_exists($folder))
        {
            mkdir($folder,0777,true); //Creating the directory
        }

        //The current directory which leades to the controller(__DIR__ )
        require_once __DIR__ . '/../models/mpdf/autoload.php';

        $mpdf = new \Mpdf\Mpdf();

        //$html = file_get_contents('reportDetails.php');
        $mpdf->WriteHTML('<h1>Ceylon Nurture</h1>');
        $mpdf->Output();//This is use to output everything which is in the screen
        // $this->view
    }
}