<?php

class header extends Controller
{
  function index()
  {

    //changed here
    $data = "none";
  }

  function viewProducts()
  {

    $products = new products();
    $data = $products->findAll();

    //to the search option
    if (isset($_GET['search'])) {
      //side that we put % mark it ignore exact matching
      $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
      $query = "select * from products where productName like :search order by productid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
      $arr['search'] = $search; //to pass to the query function
      $data = $products->query($query, $arr);
    }

    $this->view('commonUser/productsView', [
      'rows' => $data,
    ]);
  }

  function viewArticles()
  {
    $userid = Auth::userid();
    $doctor = new doctors();

    $article = new article();
    $data = $article->findAll();


    if (Auth::logged_in()) {
      //changed here
      $Auth = new Auth;
      $data2 = $Auth->finduser();
      $article = new article();
      $data3 = $article->findAll();
      //$data = $article->findAll();

      //for make a filtr by date
      $data = $article->findrange(7); //give the data according to range of days

      if ($data == null || count($data) < 4) {
        $query1 = "select * from articles order by articleid desc limit 6";
        $data = $article->query($query1);
      }
      //print_r($data);

      //to the search option
      if (isset($_GET['search'])) {
        //side that we put % mark it ignore exact matching
        $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
        $query = "select * from articles where articleName like :search order by articleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
        $arr['search'] = $search; //to pass to the query function
        $data3 = $article->query($query, $arr);
      }

      $this->view('commonUser/articlesView', [
        'rows' => $data,
        'rows2' => $data2,
        'rows3' => $data3,
      ]);
    } else {

      $article = new article();
      $data3 = $article->findAll();

      //for make a filtr by date
      $data = $article->findrange(7); //give the data according to range of days
      if ($data == null || count($data) < 4) {
        $query1 = "select * from articles order by articleid desc limit 6";
        $data = $article->query($query1);
      }

      //for find the user
      $data2 = "";

      //to the search option
      if (isset($_GET['search'])) {
        //side that we put % mark it ignore exact matching
        $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
        $query = "select * from articles where articleName like :search order by articleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
        $arr['search'] = $search; //to pass to the query function
        $data3 = $article->query($query, $arr);
      }

      $this->view('commonUser/articlesView', [
        'rows' => $data,
        'rows2' => $data2,
        'rows3' => $data3,
      ]);
    }

    //date("h:i:sa") time function
  }


  function makeDonations()
  {
    if (!Auth::logged_in()) {
      $this->redirect('login/login');
    }

    $commonUser = new common_user();
    $userid = Auth::userid();

    $data3 = $commonUser->where('userid', $userid);
    $username = $data3[0]->username;

    $donations = new donations();
    $tempdonations = new tempdonations();

    $arr1['date'] = date("Y/m/d");
    $arr1['userid'] = Auth::userid();

    $tempdonations->insert($arr1);


    //to get the last entry of the user
    $query2 = "select * from tempdonations where userid=:userid order by donationid desc limit 1";
    $arr2['userid'] = $userid;
    $dataid = $tempdonations->query($query2, $arr2);
    $orderid = $dataid[0]->donationid;

    //if(isset($_POST)=='first name') if (count($_POST['amount'])>0)
    if(isset($_POST)=='amount') {
      $arr['date'] = date("Y/m/d");
      $arr['amount'] = "null";
      $arr['userName'] = $username;
      $arr['userID'] = Auth::userid();
      $arr['donationID'] = $orderid;
      $arr['status'] = "not_completed";

      $donations->insert($arr);
      $tempdonations->delete($orderid);
    }
    //to get the last entry of the user
    // $query1 = "select * from donations where userID = :userid order by feesID desc limit 1";
    // $arr1['userid'] = $userid;
    // $dataid = $donations->query($query1, $arr1);

    $data = $commonUser->where('userid', $userid);
    if ($data) {
      $data = $data[0];
    }
    $this->view('donations', [
      'data' => $data,
      'orderid' => $orderid,
    ]);
  }
}
