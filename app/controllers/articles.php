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
        $Auth = new Auth;
        $data2 = $Auth->finduser(); 

        //print_r("$data");
        //die;
        $this->view('articles/articleDetails',[
            'rows'=>$data,
            'data2'=>$data2,
        ]);
       
    }
}

