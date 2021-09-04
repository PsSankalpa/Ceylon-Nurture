<?php
class home extends Controller
{
    function index($page = '',$title = '',$subpage = '')//we can take the values in the url in by this way
    {
        $db = new database();
        $db->db_connect();
        $image_class = $this->loadModel("image_class");//load the relevant model
        //utilize the above loaded model here
        $this->view("home"); 
    }
}

?>
