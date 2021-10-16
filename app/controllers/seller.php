<?php
class seller extends Controller
{
    function index()
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $products = new products();
        $userid = Auth::userid();
        $data = $products->where('sellerid',$userid); 


        $this->view('seller/seller',['rows'=>$data]);
       
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
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        if(count($_POST)>0)
        {
            
            $sellers = new sellers();//create the instance of the seller in model
            
            
            if($sellers->validate($_POST,$_FILES))
            {
                global $des;
                $arr['userid'] = Auth::userid();
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['tpNumber2'] = Auth::tpNumber();
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;
             
               
                $sellers->insert($arr);
                $this->redirect('home/home');
            }
            else{
                $errors = $sellers->errors;
            }
        } 
        $this->view('seller/sellerregi',[
			'errors'=>$errors,
		]);
    }

    function uploadProduct()
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        
        if(count($_POST)>0)
        {
            $products = new products();
            $seller = new sellers();
            $userid = Auth::userid();
            if(!empty($row = $seller->where('userid',$userid) ))
            {
               $row = $row[0];
               $nameWithInitials= $row->nameWithInitials;
               $address = $row->address;
            }
            else{
                $nameWithInitials = "";
                $address = "";
            }

            Print_r($_POST);
            
            if($products->validate($_POST,$_FILES))
            {
                global $des;
                $arr['productName'] = htmlspecialchars($_POST['productName']);
                $arr['productPrice'] = htmlspecialchars($_POST['productPrice']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['image'] = $des;
                $arr['category'] = htmlspecialchars($_POST['category']);
                $arr['sellerName'] = $nameWithInitials;
                $arr['address'] = $address;
                $arr['tpNumber'] = Auth::tpNumber();
                $arr['sellerid'] = Auth::userid();

                print_r($arr);
                die;
                
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

    function editProduct($productid = null)
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        $products = new products();
        
        if(count($_POST)>0)
        {
            
            if($products->validate($_POST,$_FILES))
            {
                global $des;
                $arr['productName'] = $_POST['productName'];
                $arr['productPrice'] = $_POST['productPrice'];
                $arr['description'] = $_POST['description'];
                $arr['image'] = $des;
                $arr['category'] = $_POST['category'];


                $products->update($productid,$arr);
                $this->redirect('seller');
            }
            else{
                $errors = $products->errors2;
            }
        }
        $row =$products->where('productid',$productid); //in here row is an array
        
        if($row)
        {
            $row = $row[0];
            unlink($row->image);
        }
        $this->view('seller/editProduct',[
			'errors'=>$errors,
            'row'=>$row,
		]);

    }

    function deleteProduct($productId = null)
    {
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

        $errors = array();
        $products = new products();
        
        if(count($_POST)>0)
        {

                $products->delete($productId);
                $this->redirect('seller');
            
            
        }
        $row =$products->where('productid',$productId); //in here row is an array
        $data =$products->where('productid',$productId);
        if($row)
        {
            $row = $row[0];
            unlink($row->image);
        }
        $this->view('seller/deleteProduct',[
            'row'=>$row,
            'rows'=>$data,
		]);

    }

    function productDetails($productId = null)
    {

        $products = new products();
        $data =$products->where('productId',$productId); 


        $this->view('seller/ProductDetails',['rows'=>$data]);
       
    }

}
