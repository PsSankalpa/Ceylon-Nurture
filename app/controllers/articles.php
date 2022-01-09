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

        $article = new article();
        $data = $article->where('articleid', $articleid);

        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        $articles = new article();

        if (count($_POST) > 0) {

            $row = $articles->where('articleid', $articleid);
             //in here row is an array
             if ($row) {
                $row = $row[0];
                unlink("public/".$row->image);
            }

            $articles->delete($articleid);
            $this->redirect('doctor/myArticles');

            
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
        ]);
    }
}
