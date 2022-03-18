<?php

class articles extends Controller
{
    function index()
    {
    }

    function articleDetails($articleid = null)
    {
        $data2 = "";
        if (Auth::logged_in()) {
            $Auth = new Auth;
            $data2 = $Auth->finduser();
        }

        $userid = Auth::userid();
        $article = new article();
        $data = $article->where('articleid', $articleid);


        if (null != ($article->where('doctorid', $userid))) {
            $data3 = 'owner';
        } else {
            $data3 = "";
        }

        //to get article reviews
        $reviews = new articleReview();
        $data4 = $reviews->where('articleid', $articleid);
        if ($data4 == null) {
            $data4 = "";
        }


        $errors = array();
        $articles = new article();

        if (isset($_POST['delete'])) {

            $row = $articles->where('articleid', $articleid); //in here row is an array
            if ($row) {
                $row = $row[0];
                unlink($row->image);
            }

            $articles->delete($articleid);
            $this->redirect('doctor/myArticles');
        }

        //to get the username
        $username = "";
        if (Auth::logged_in()) {
            $common_user = new common_user();
            $data_name = $common_user->where('userid', $userid);
            if ($data_name) {
                $data_name = $data_name[0];
            }
            $username = $data_name->username;
        }
        else{
            $username = "";
        }


        if (isset($_POST['review'])) {

            $arr['reviewOwner'] = $username;
            $arr['review'] = htmlspecialchars($_POST['review']);
            $arr['articleid'] = $articleid;
            $arr['ownerid'] = Auth::userid();

            $reviews->insert($arr);
            $this->redirect('articles/articleDetails/' . $articleid); //put the function name    
        }

        // $this->view('seller/deleteProduct', [
        //     'row' => $row,
        //     'rows' => $data,
        // ]);

        //print_r("$data");
        //die;
        $this->view('articles/articleDetails', [
            'rows' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
        ]);
    }

    //for the article reviews
    function articlereview($articleid = null)
    {

        $this->view('articles/articleReviews', [
            // 'rows' => $data,
            // 'data2' => $data2,
            // 'data3' => $data3,
        ]);
    }
}
