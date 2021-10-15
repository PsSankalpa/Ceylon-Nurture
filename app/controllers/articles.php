<?php

class articles extends Controller
{
    function index()
    {
      
        
       
    }

    function articleDetails($articleid = null)
    {
        $data2 = "";
        if(Auth::logged_in())
        {
            $Auth = new Auth;
            $data2 = $Auth->finduser();
        }
      
        $article = new article();
        $data =$article->where('articleid',$articleid); 
        

        //print_r("$data");
        //die;
        $this->view('articles/articleDetails',[
            'rows'=>$data,
            'data2'=>$data2,
        ]);
       
    }
}

