<?php
class home extends Controller
{
  function index($page = '', $title = '', $subpage = '') //we can take the values in the url in by this way
  {
    //$db = new database();
    //$data['results'] = $db->read("Select * from images");
    $data['page_title'] = "Ceylon Nurture Home";

    //$image_class = $this->loadModel("image_class");//load the relevant model
    //utilize the above loaded model here
    //$this->view("home",$data); //in here put the relevent page name and the path
    $userid = Auth::userid();
    $doctor = new doctors();
    if (Auth::logged_in()) {
      //changed here
      $Auth = new Auth;
      $data = $Auth->finduser();

      //to get the latest articles
      $article = new article();
      $data2 = $article->findrange(7);
      if ($data2 == null || count($data2) < 4) {
        $query1 = "select * from articles order by articleid desc limit 6";
        $data2 = $article->query($query1);
      }

      //to delete incomplete donations
      $donations = new donations();

      if ($donations->where('status', 'not_completed')) {
        $donations->delete3('status', 'not_completed','userID',$userid);
      }

      $contactus = new contactus();

      if(isset($_POST['submit']))
      {  
        // $arr['date'] = date("Y-m-d H:i:s");
        $arr['fullname'] = htmlspecialchars($_POST['fullname']);
        $arr['email'] = htmlspecialchars($_POST['email']);
        $arr['message'] = htmlspecialchars($_POST['message']);
        print_r($arr);
        die;
        $contactus->insert($_POST);
        print_r($_POST);
        die;
        $this->redirect('landing/home');
      }


      $this->view('home', [
        'rows' => $data2,
        'data' => $data,
      ]);
    } else {

      //to get the latest articles
      $article = new article();
      $data2 = $article->findrange(7);
      if ($data2 == null || count($data2) < 4) {
        $query1 = "select * from articles order by articleid desc limit 6";
        $data2 = $article->query($query1);
      }
      $contactus = new contactus();
      
      if(isset($_POST['submit']))
      {  
        // $arr['date'] = date("Y-m-d H:i:s");
        $arr['fullname'] = htmlspecialchars($_POST['fullname']);
        $arr['email'] = htmlspecialchars($_POST['email']);
        $arr['message'] = htmlspecialchars($_POST['message']);
        //print_r($arr);
        //die;
        $contactus->insert($_POST);
        //print_r($_POST);
       
        $this->redirect('landing/home');
      }



      $data = "";
      $this->view('home', [
        'rows' => $data2,
        'data' => $data,
      ]);
    }
  }
}
