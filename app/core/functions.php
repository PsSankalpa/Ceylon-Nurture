<?php
//to get add values
 function get_var($key)
 {
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }

    return "";
 }
 function get_select($key,$value)
 {
    if(isset($_POST[$key]))
    {
        if($_POST[$key] == $value)
        {
           return "selected";
        }
    }
    
    return "";
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