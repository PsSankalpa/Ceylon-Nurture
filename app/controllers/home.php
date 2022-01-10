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
      $data = $Auth->finduser();

      $article = new article();
      $data2 = $article->findrange(7);

      $this->view('home', [
        'rows' => $data2,
        'data'=>$data,
      ]);
    } else {
      $article = new article();
      $data2 = $article->findrange(7);

      $data = "";
      $this->view('home', [
        'rows' => $data2,
        'data'=>$data,
      ]);
    }
    }
}
?>
