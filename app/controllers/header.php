<?php

class header extends Controller
{
    function index()
    {
        
        //changed here
        $data ="none";
        
        
     }
    
    function viewPoducts()
    {
      
        $products = new products();
        $data =$products->findAll(); 


        $this->view('commonUser/ProductsView',['rows'=>$data]);
       
    }

    function viewArticles()
    {
      $userid = Auth::userid();
      $doctor = new doctors();
      if(Auth::logged_in())
      {
         //changed here
            $Auth = new Auth;
            $data2 = $Auth->finduser();
            $article = new article();
            $data =$article->findAll(); 

            $this->view('commonUser/articlesView',[
            'rows'=>$data,
            'rows2'=>$data2,
            ]);
      }
      else{
         $article = new article();
         $data =$article->findAll(); 
         $data2 = "";
         $this->view('commonUser/articlesView',[
           'rows'=>$data,
           'rows2'=>$data2,
         ]);
      }
        
       
    }
}

?>