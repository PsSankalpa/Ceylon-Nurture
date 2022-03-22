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

        //nest we need to create arrays of the data

        $this->view('chartst', [
            'chartdata' => $chartdata,
        ]);

    }


}

?>