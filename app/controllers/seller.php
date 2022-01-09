<?php
class seller extends Controller
{
    function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $Auth = new Auth;
        $data2 = $Auth->finduser();
        $type = "Product";
        $type2 = "Herb";

        $products = new products();
        $userid = Auth::userid();
        $data = $products->where('sellerid', $userid);
        $sellers = new sellers();
        $data3 = $sellers->where('userid', $userid);

        if ($z1 = $products->where2('sellerid', $userid, 'category', $type)) {
            $data4 = count($z1);
        } else {
            $data4 = 0;
        }

        if ($z2 = $products->where2('sellerid', $userid, 'category', $type2)) {
            $data5 = count($z2);
        } else {
            $data5 = 0;
        }

        if ($z3 = $products->where('sellerid', $userid)) {
            $data6 = count($z3);
        } else {
            $data6 = 0;
        }
        //print_r($data5);
        //die;


        $this->view('seller/seller', [
            'rows' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
        ]);
    }

    //get the file destination
    function get_destination($destination)
    {
        global $des;
        $des = $destination;
        return $des;
    }

    //function for registration
    function registration()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $commonUser = new common_user();
        $userid = Auth::userid();
        $data4 = $commonUser->where('userid', $userid);
        if ($data4) {
            $data4 = $data4[0];
        }

        $errors = array();
        if (count($_POST) > 0) {

            $sellers = new sellers(); //create the instance of the seller in model


            if ($sellers->validate($_POST, $_FILES)) {
                global $des;
                $arr['userid'] = Auth::userid();
                $arr['nameWithInitials'] = $data4->nameWithInitials;
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['tpNumber'] = $data4->tpNumber;
                //$arr['tpNumber2'] = Auth::tpNumber();
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;


                $sellers->insert($arr);
                $this->redirect('home/home');
            } else {
                $errors = $sellers->errors;
            }
        }
        $this->view('seller/sellerregi', [
            'errors' => $errors,
        ]);
    }

    function uploadProduct()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();

        if (count($_POST) > 0) {
            $products = new products();
            $seller = new sellers();
            $userid = Auth::userid();
            if (!empty($row = $seller->where('userid', $userid))) {
                $row = $row[0];
                $nameWithInitials = $row->nameWithInitials;
                $address = $row->address;
            } else {
                $nameWithInitials = "";
                $address = "";
            }

            if ($products->validate($_POST, $_FILES)) {
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

                $products->insert($arr);
                $this->redirect('seller/seller');
            } else {
                $errors = $products->errors2;
            }
        }
        $this->view('seller/uploadProduct', [
            'errors' => $errors,
        ]);
    }

    function editProduct($productid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        $products = new products();

        if (count($_POST) > 0) {

            if ($products->validate($_POST, $_FILES)) {
                global $des;
                $arr['productName'] = $_POST['productName'];
                $arr['productPrice'] = $_POST['productPrice'];
                $arr['description'] = $_POST['description'];
                $arr['image'] = $des;
                $arr['category'] = $_POST['category'];


                $products->update($productid, $arr);
                $this->redirect('seller');
            } else {
                $errors = $products->errors2;
            }
        }
        $row = $products->where('productid', $productid); //in here row is an array

        if ($row) {
            $row = $row[0];
            if (file_exists($row->image)) {
                unlink("public/".$row->image);
            }
        }
        $this->view('seller/editProduct', [
            'errors' => $errors,
            'row' => $row,
        ]);
    }

    function deleteProduct($productId = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        $products = new products();

        if (count($_POST) > 0) {

            $products->delete($productId);
            $this->redirect('seller');
        }
        $row = $products->where('productid', $productId); //in here row is an array
        $data = $products->where('productid', $productId);
        if ($row) {
            $row = $row[0];
            unlink("public/".$row->image);//made a change here for the url
        }
        $this->view('seller/deleteProduct', [
            'row' => $row,
            'rows' => $data,
        ]);
    }

    function productDetails($productId = null)
    {

        $products = new products();
        $data = $products->where('productId', $productId);


        $this->view('seller/ProductDetails', ['rows' => $data]);
    }
}
