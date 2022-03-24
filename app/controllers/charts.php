<?php
class charts extends Controller
{
    function index()
    {

        //-----------------user data------------------------------------------------------------------------
        $chartdata = array();
        //$chartdata = new chartsjs();
        //$data = $chartdata->findAll();
        $sellers = new sellers();
        $data2 = $sellers->findAll();
        $doctor = new doctors();
        $data3 = $doctor->findAll();
        $commonUser = new common_user();
        $data4 = $commonUser->findAll();

        $sCount = count($data2);
        $dCount = count($data3);
        $cCount = count($data4);

        //print_r($sCount);
        //print_r(" ");
        //print_r($dCount);
        //print_r(" ");
        //print_r($cCount);

        //-----------------------getting user count monthlyvise----------------------------------------------------

        $donations = array();
        $cmonth = array();
        $ccount = array();
        $registerdates = array();
        //for the range of month data
        $commonUser = new common_user();

        $details0 = $commonUser->findAll();
        //print_r(count($details0));

        for ($z = 0; $z < count($details0); $z++) {

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



        //$chartdata = array($sCount, $dCount, $cCount);
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

        for ($z = 0; $z < count($details1); $z++) {

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

        for ($z = 0; $z < count($details2); $z++) {

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
                $dcommission = new donations();
        
                $details2 = $dcommission->findAll();
                //print_r(count($details2));
        
                for ($z = 0; $z < count($details2); $z++) {
        
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
                $appointments = array($dcount[3], $dcount[2], $dcount[1], $dcount[0]);
        
                //-------------------end of getting appointment payment details monthlyvise----------------------

                

        // print_r($pcommissiondata);
        // print_r(" ");
        // print_r($date0);

        $this->view('chartst', [
            'chartdata' => $chartdata,
            'registerdates'=> $registerdates,
            'pcommissiondata' => $pcommissiondata,
            'paymentdates' => $paymentdates,
            'donations' => $donations,
        ]);
    }
}
