<?php
class admin extends Controller
{
    function index()
    {
      
       $admin = new admin();
        //$data = $common_user->findAll();

        $this->view("admin/admin",['rows'=>$data]); //in here put the relevent page name and the path
    }
}
