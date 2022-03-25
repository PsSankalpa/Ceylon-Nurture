<?php
class commonuser extends Controller
{
    function index()
    {
      
    if(!Auth::logged_in())
       {
          $this->redirect('login/login');

        }

       $common_user = new common_user();
       
        //$data = $common_user->findAll();

        $this->view("common_user"); //in here put the relevent page name and the path
    }

    function viewPoducts()
    {
      
        $products = new products();
        $data =$products->findAll(); 


        $this->view('commonUser/ProductsView',['rows'=>$data]);
       
    }

    function donationdetails()
    {
  
      $userid = Auth::userid();
  
      $donations = new donations();
  
      if ($donations->where2('status', 'not_completed', 'userID', $userid)) {
        $donations->delete3('status', 'not_completed', 'userID', $userid);
      }
      $data2 = $donations->where2('userID', $userid, 'status', 'completed');
  
      $this->view('commonUser/cpaymentTable', ['rows' => $data2]);
    }
  
    public function generatepdf($id)
    {
      $userid = Auth::userid();
      require_once __DIR__ . '/../models/mpdf/autoload.php';
      $mpdf = new \Mpdf\Mpdf();
      $html = file_get_contents(ROOT . '/commonuser/paymentpdf/' . $id . '/' . $userid);
      // print_r($html);
      // die;
      $mpdf->WriteHTML($html);
      $mpdf->Output();
    }
  
    function paymentpdf($id, $userid)
    {
  
      $donations = new donations();
      $seller = new sellers();
  
      $data1 = $donations->where('feesID', $id);
  
      if ($data1 != null) {
        $data1 = $data1[0];
      }
  
  ?>
      <style>
        th,
        td {
          text-align: left;
          padding: 16px;
        }
  
        .title2 {
          width: 95%;
          text-align: center;
        }
      </style>
  
      <div class="title1" style="width: 95%;">
        <div class="logo" style="width: 100%;text-align: center;"><img src="<?= ASSETS ?>img/logo.png" style="width: 30%;align-items: center;"></div>
        <div class="mtitle" style="width: 100%;text-align: center;">
          <h1>Ceylon Nuture</h1>
        </div>
      </div>
      <hr>
      <div class="title2">
        <h2>Payment Detials</h2>
      </div>
      <table style="border-collapse: collapse;border-spacing: 0;width: 85%;border: 1px solid #ddd;margin: 5% auto;">
        <tr>
          <td>Name With initials</td>
          <td>:</td>
          <td><?= $data1->userName ?></td>
        </tr>
        <tr>
          <td>Donation ID</td>
          <td>:</td>
          <td><?= $data1->donationID ?></td>
        </tr>
        <tr>
          <td>Date</td>
          <td>:</td>
          <td><?= $data1->date ?></td>
        </tr>
        <tr>
          <td>Amount</td>
          <td>:</td>
          <td>Rs:<?= $data1->amount ?></td>
        </tr>
        <tr>
          <td>Status</td>
          <td>:</td>
          <td><?= $data1->status ?></td>
        </tr>
      </table>
  
  <?php
  
    }

}



























/*class common_user extends Controller
{
    function index()
    {
        $common_user = new Common_User();


        $this->view('signup');

    }
    //function for registration
    function registration()
    {
        $errors = array();
        if(count($_POST)>0)
        {
            
            $common_user = new Common_User();//create the instance of the user in model
            
            if($common_user->validate($_POST))
            {
                global $des;
                $arr['fname'] = htmlspecialchars($_POST['fname']);
                $arr['lname'] = htmlspecialchars($_POST['lname']);
                $arr['username'] = htmlspecialchars($_POST['username']);
                $arr['email'] = htmlspecialchars($_POST['email']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['password'] = htmlspecialchars($_POST['password']);
                $arr['password2'] = htmlspecialchars($_POST['password2']);
                $arr['conditions'] = htmlspecialchars($_POST['conditions']);
                

                $common_user->insert($arr);
                $this->redirect('login');
            }
            else{
                $errors = $common_user->errors;
            }
        } 
        $this->view('signup',[
			'errors'=>$errors,
		]);


}*/