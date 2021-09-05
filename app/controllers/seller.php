<?php
class seller extends Controller
{
    function index()
    {
        $data['page_title'] = "Ceylon Nurture Seller";

        $this->view("seller",$data); 
    }
}
