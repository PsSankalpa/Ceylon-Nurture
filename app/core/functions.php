<?php
//to get add values
 function get_var($key)
 {
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
 }

 function get_file()
 {

 }

 function esc($var)
 {
    return htmlspecialchars($var);//remove the special charactors
 }