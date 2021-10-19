<?php

class payments extends Controller{

    function index()
    {
        if(count($_POST)>0)
        {
            print_r($_POST);
            die;
        }
    }
}