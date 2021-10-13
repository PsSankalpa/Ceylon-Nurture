<?php

class articles extends Controller
{
    function index()
    {
      
        
       
    }

    function articleDetails($articleid = null)
    {
      
        $article = new article();
        $data =$article->where('articleid',$articleid);  

        //print_r("$data");
        //die;
        $this->view('articles/articleDetails',[
            'rows'=>$data,
        ]);
       
    }
}

