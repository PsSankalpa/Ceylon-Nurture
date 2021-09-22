<?php
//to get add values
 function get_var($key)
 {
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
 }

 function get_file($img)
 {
   if(isset($_FILES[$img]))
    {
        return $_FILES[$img];
    }
 }

 function esc($var)
 {
    return htmlspecialchars($var);//remove the special charactors
 }