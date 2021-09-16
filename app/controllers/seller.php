<?php
class seller extends Controller
{
    function index()
    {
        //$name = ['page_title']= "seller";

        //$sellers = $this->load_model('Sellers');

        $sellers = new Sellers(); 
        
        //$sellers->insert($arr);
        //$sellers->update(2,$arr);
        //sellers->delete(id);
        //$data = $sellers->findAll();
        //$data = $sellers->where('nameWithInitials','Sankalpa');

        $this->view('seller/seller');
         
    }

    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $sellers = new sellers();//create the instance of the seller in model

            if($sellers->validate($_POST))
            {
                $arr['nameWithInitials'] = $_POST['nameWithInitials'];
                $arr['registrationNumber'] = $_POST['registrationNumber'];
                $arr['tpNumber'] = $_POST['tpNumber'];
                $arr['nic'] = $_POST['nic'];
                $arr['address'] = $_POST['address'];

                $sellers->insert($arr);
                $this->redirect('seller/seller');
            }
            else{
                $errors = $sellers->errors;
            }
        } 
        $this->view('seller/sellerregi',[
			'errors'=>$errors,
		]);
        
        //$arr['nameWithInitials'] = 'Piyum Pavithra';
        //$arr['registrationNumber'] = '343151353';
        //$arr['tpNumber'] = '112946980';
        //$arr['nic'] = '97584938V';
        //$arr['address'] = 'egsgsa gfgsg dhd';

        //$sellers->insert($arr);
        //$sellers->update(2,$arr);
        //sellers->delete(id);
        //$data = $sellers->findAll();
        //$data = $sellers->where('nameWithInitials','Sankalpa');

        /* [nameWithInitials] => 
        [registrationNumber] => 
        [tpNumber] => 
        [nic] => 
        [address] => 
        [image]  */

        
        
         
    }
}
