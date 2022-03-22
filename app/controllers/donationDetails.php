<?php
class donationDetails extends Controller
{
    function index()
    {
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

        if (($local_md5sig === $md5sig) and ($status_code == 2)) {
            //TODO: Update your database as payment success
            $donations = new donations();
            $donations->update2($order_id, $arr);

            if ($donations->where('status', 'not_completed')) {
                $donations->delete2('status', 'not_completed');
            }
        } else {
            $donations = new donations();
            if ($donations->where('status', 'not_completed')) {
                $donations->delete2('status', 'not_completed');
            }
        }
    }
}
