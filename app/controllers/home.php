<?php
class home extends Controller
{
    function index($page = '',$title = '',$subpage = '')//we can take the values in the url in by this way
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
      $data2 = $Auth->finduser();
      $article = new article();
      $data = $article->findAll();

      $this->view('home', [
        'rows' => $data,
        'rows2' => $data2,
      ]);
    } else {
      $article = new article();
      $data = $article->findAll();
      $data2 = "";
      $this->view('home', [
        'rows' => $data,
        'rows2' => $data2,
      ]);
    }
    }
}
?>
