<?php
class seller extends Controller
{
    function index()
    {
        $data['page_title'] = "Ceylon Nurture Seller";
        $this->view("seller",$data);

        if(isset($_POST['registrationNumber']))
        {
            $seller = $this->loadModel("re_seller");
            $seller->signup($_POST); 
        }

        /*$user = $this->loadModel("re_seller");
        $user->signup($_POST);*/
         
    }
}
