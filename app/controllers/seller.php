<?php
class seller extends Controller
{
    function index()
    {
        //$name = ['page_title']= "seller";

        //$sellers = $this->load_model('Sellers');

        $sellers = new Sellers(); 
        
        
        $arr['nameWithInitials'] = 'Piyum Pavithra';
        //$arr['registrationNumber'] = '343151353';
        //$arr['tpNumber'] = '112946980';
        $arr['nic'] = '97584938V';
        //$arr['address'] = 'egsgsa gfgsg dhd';

        //$sellers->insert($arr);
        $sellers->update(2,$arr);
        //sellers->delete(id);
        $data = $sellers->findAll();
        //$data = $sellers->where('nameWithInitials','Sankalpa');

        $this->view('seller',['rows'=>$data]);
         
    }
}
