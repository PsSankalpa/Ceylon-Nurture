<?php
class logout extends Controller
{
    function index()
    {
        Auth::logout();
        $this->redirect('home');
    }
}