<?php
class seller extends Controller
{
    function index()
    {
        //$name = ['page_title']= "seller";

        //$sellers = $this->load_model('Sellers');

        $sellers = new Sellers(); 
        
        
        $arr['nameWithInitials'] = 'Piyum';
        $arr['registrationNumber'] = '343151353';
        $arr['tpNumber'] = '112946980';
        $arr['nic'] = '43124b';
        $arr['address'] = 'egsgsa gfgsg dhd';

        $sellers->insert($arr);
        //sellers->update(id,$data);
        //sellers->delete(id);
        $data = $sellers->findAll();
        //$data = $sellers->where('nameWithInitials','Sankalpa');

        $this->view('seller',['rows'=>$data]);
         
    }
}
