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

  //---------------------------for view articles-----------------------------------
  function viewArticles()
  {
    // $userid = Auth::userid();
    $doctor = new doctors();

    $article = new article();
    // $data = $article->findAll();

    if (Auth::logged_in()) {
      //changed here
      $Auth = new Auth;
      $data2 = $Auth->finduser();

      $query0 = "select * from articles where status = 1";
      $data3 = $article->query($query0);
      //$data3 = $article->findAll();

      //to display option
      $display = "view";

      //for make a filtr by date
      $data = $article->findrange2(7); //give the data according to range of days

      if ($data == null || count($data) < 4) {
        $query1 = "select * from articles where status = 1 order by articleid desc limit 6";
        $data = $article->query($query1);
      }
      //print_r($data);

      //to the search option
      if (isset($_GET['search'])) {
        //side that we put % mark it ignore exact matching
        $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
        $query = "select * from articles where articleName like :search and status = 1 order by articleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
        $arr['search'] = $search; //to pass to the query function
        $data3 = $article->query($query, $arr);
        $display = "hide";
      }

      $this->view('commonUser/articlesView', [
        'rows' => $data,
        'rows2' => $data2,
        'rows3' => $data3,
        'display' => $display,
      ]);
    } else {
      //when log out or admin logged in-------------------------------

      $A_status = "";
      if (Auth::logged_in_admin()) {
        $A_status = "Admin";
      }

      //to get the articles
      $article = new article();
      if ($A_status == "Admin") {
        $data3 = $article->findAll();
      } else {
        $query0 = "select * from articles where status = 1";
        $data3 = $article->query($query0);
      }

      //to display option
      $display = "view";

      $article = new article();
      if ($A_status == "Admin") {

        //for make a filtr by date
        $data = $article->findrange(7); //give the data according to range of days
        if ($data == null || count($data) < 4) {
          $query1 = "select * from articles order by articleid desc limit 6";
          $data = $article->query($query1);
        }
      } else {
        //for make a filtr by date
        $data = $article->findrange2(7); //give the data according to range of days
        if ($data == null || count($data) < 4) {
          $query1 = "select * from articles where status = 1 order by articleid desc limit 6";
          $data = $article->query($query1);
        }
      }


      //for find the user
      $data2 = "";

      if ($A_status == "Admin") {

        //to the search option
        if (isset($_GET['search'])) {
          //side that we put % mark it ignore exact matching
          $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
          $query = "select * from articles where articleName like :search order by articleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
          $arr['search'] = $search; //to pass to the query function
          $data3 = $article->query($query, $arr);
          $display = "hide";
        }

        //to the search option
        if (isset($_GET['search1'])) {
          //side that we put % mark it ignore exact matching
          $search = 0; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
          $query = "select * from articles where status = 0 order by articleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
          $arr['search'] = $search; //to pass to the query function
          $data3 = $article->query($query, $arr);
          $display = "hide";
        }
        //to the search option
        if (isset($_GET['search2'])) {

          $query0 = "select * from articles where status = 1";
          $data3 = $article->query($query0);
          $display = "hide";
        }
        
      } else {

        //to the search option
        if (isset($_GET['search'])) {
          //side that we put % mark it ignore exact matching
          $search = '%' . $_GET['search'] . '%'; //by putting % mark, it ignore the words or letters in the beginin and the end, only consider what's in the GET
          $query = "select * from articles where articleName like :search and status = 1 order by articleid desc"; //put like instead of = sign,becasue we cannot search for exact word in the search
          $arr['search'] = $search; //to pass to the query function
          $data3 = $article->query($query, $arr);
          $display = "hide";
        }
      }

      $this->view('commonUser/articlesView', [
        'rows' => $data,
        'rows2' => $data2,
        'rows3' => $data3,
        'display' => $display,
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
    if (isset($_POST) == 'amount') {
      $arr['date'] = date("Y/m/d");
      $arr['amount'] = 0;
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
