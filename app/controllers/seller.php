<?php
class seller extends Controller
{
    function index()
    {
        //$name = ['page_title']= "seller";

        //$sellers = $this->load_model('Sellers');

        $sellers = new Sellers(); 

        


        $this->view('seller/seller');

         
    }

    //get the file destination
    function get_destination($destination)
    {
        global $des;
        $des =$destination;
        return $des;
    }

    //function for registration
    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $sellers = new sellers();//create the instance of the seller in model
            
            if($sellers->validate($_POST,$_FILES))
            {
                global $des;
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;
             
               
                $sellers->insert($arr);
                $this->redirect('seller');
            }
            else{
                $errors = $sellers->errors;
            }
        } 
        $this->view('seller/sellerregi',[
			'errors'=>$errors,
		]);

        //$sellers->insert($arr);
        //$sellers->update(2,$arr);
        //sellers->delete(id);
        //$data = $sellers->findAll();
        //$data = $sellers->where('nameWithInitials','Sankalpa');

        /* [nameWithInitials] => 
        [registrationNumber] => 
        [tpNumber] => 
        [nic] => 
        [address] => 
        [image]  */ 
    }

    function uploadProduct()
    {
        $errors = array();
        
        if(count($_POST)>0)
        {
            $products = new products();

            if($products->validate($_POST,$_FILES))
            {
                global $des;
                $arr['productName'] = $_POST['productName'];
                $arr['productPrice'] = $_POST['productPrice'];
                $arr['description'] = $_POST['description'];
                $arr['image'] = $des;
                $arr['category'] = $_POST['category'];

                $products->insert($arr);
                $this->redirect('seller/seller');
            }
            else{
                $errors = $products->errors2;
            }
        } 
        $this->view('seller/uploadProduct',[
			'errors'=>$errors,
		]);

    }

}
