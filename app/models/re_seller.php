<?php

class re_seller
{
    function signup($POST)
    {
        $db = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['nameWithInitials']))
        {
            $nameWithInitials = $POST['nameWithInitials'];
            $registrationNumber = $POST['registrationNumber'];
            $nic = $POST['nic'];
            $tpNumber = $POST['tpNumber'];
            $address = $POST['address'];

            $query = "INSERT INTO seller (nameWithInitials,registrationNumber,nic,tpNumber,address) values('$nameWithInitials','$registrationNumber','$nic','$tpNumber','$address')";
            /*$data = $db->write($query,$arr);//return array of objects
            if ($data)//check if the data come as an array
            {
                 header("Location:".ROOT."home");
                 die;
            }*/
        }
        else
        {
            $_SESSION['error'] = "";
        }
    }
}