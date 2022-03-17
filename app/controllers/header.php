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

    $this->view('commonUser/ProductsView', [
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
      
      if($data == null || count($data)<4)
      {
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
      if($data == null || count($data)<4)
      {
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
    $commonUser = new common_user();
    $userid = Auth::userid();
    $data = $commonUser->where('userid', $userid);
    if ($data) {
      $data = $data[0];
    }
    $this->view('donations', [
      'data' => $data,
    ]);
  }
}
