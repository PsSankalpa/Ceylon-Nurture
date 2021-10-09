<?php

class header extends Controller
{
    function viewPoducts()
    {
      
        $products = new products();
        $data =$products->findAll(); 


        $this->view('commonUser/ProductsView',['rows'=>$data]);
       
    }
}

?>