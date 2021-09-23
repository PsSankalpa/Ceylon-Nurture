<?php
//to get add values
//put a default value to display in the edit mode
 function get_var($key,$default = "")
 {
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }
    return $default;
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