<?php
class charts extends Controller
{
    function index()
    {

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


        $chartdata = array($sCount, $dCount,$cCount);
        // Attempt select query execution
        // try{
        //     $sql = $chartdata->findAll();  
        //     $result = $pdo->query($sql);
        //     if($result->rowCount() > 0) {
        //     while($row = $result->fetch()) {
        //     }
        
        //     unset($result);
        //     } else {
        //     echo "No records matching your query were found.";
        //     }
        // } catch(PDOException $e){
        //     die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        // }

        //-----------------------getting data monthlyvise----------------------------------------------------
        //for the range of month data
        $commission = new productcommission();
        
        //for the current month---------------------------------------
        $month0 = $commission->getrange(0,'MONTH');
        $count0 = 0;
        for($j = 0;$j <count($month0);$j++){
            if(isset($month0[$j]->amount)){
                $count0 = $count0 + $month0[$j]->amount;
            }
        }
        //print_r($month0);
        print_r(" ");
        print_r($count0);

        //for the second month-----------------------------------------
        $month1 = $commission->getrange(1,'MONTH');
        $count1 = 0;
        for($j = 0;$j <count($month1);$j++){
            if(isset($month1[$j]->amount)){
                $count1 = $count1 + $month1[$j]->amount;
            }
        }
        //print_r($month1);
        print_r(" ");
        print_r($count1);

        //for the third month--------------------------------------------
        $month2 = $commission->getrange(2,'MONTH');
        $count2 = 0;
        for($j = 0;$j <count($month2);$j++){
            if(isset($month2[$j]->amount)){
                $count2 = $count2 + $month2[$j]->amount;
            }
        }
        //print_r($month2);
        print_r(" ");
        print_r($count2);
        
        //for the fourth month--------------------------------------------
        $month3 = $commission->getrange(3,'MONTH');
        $count3 = 0;
        for($j = 0;$j <count($month3);$j++){
            if(isset($month3[$j]->amount)){
                $count3 = $count3 + $month3[$j]->amount;
            }
        }
        //print_r($month3);
        print_r(" ");
        print_r($count3);

        $pcommissiondata = array($count3, $count2,$count1,$count0);

        print_r($pcommissiondata);
        print_r(" ");
        print_r($chartdata);
        
        $sCount = count($data2);
        $dCount = count($data3);
        $cCount = count($data4);

        $this->view('chartst', [
            'sCount' => $sCount,
            'dCount' => $dCount,
            'cCount' => $cCount,
            'chartdata' => $chartdata,
            'pcommissiondata' => $pcommissiondata,
        ]);

    }


}

?>