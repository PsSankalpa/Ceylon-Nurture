<?php
class donationdetails extends Controller
{
    function index()
    {
        
    }

    public function getdonationdetails(){

        // Print_r($qwert);

        $merchant_id         = $_POST['merchant_id'];
        $order_id             = $_POST['order_id'];
        $payhere_amount     = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig                = $_POST['md5sig'];

        $arr['date'] = date("Y/m/d");
        $arr['amount'] = $_POST['payhere_amount'];
        $arr['donationID'] = $order_id;
        $arr['status'] = "completed";

        $merchant_secret = '4p6oM65yLel8lzSHKYzqtQ4TwgRmoRLvF49dAyBUptlC'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        $local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));

        if (($local_md5sig === $md5sig) and ($status_code == 2))
        {
            //TODO: Update your database as payment success
            $donations = new donations();
            $donations->update2($order_id, $arr);

        } 
        else 
        {
            $donations = new donations();
            if ($donations->where2('status', 'not_completed','donationID',$order_id)) {
                $donations->delete3('status', 'not_completed','donationID',$order_id);
              }
        
        }
    }
}
