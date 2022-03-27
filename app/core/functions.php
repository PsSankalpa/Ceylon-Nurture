<?php
//to get add values
//put a default value to display in the edit mode
 function get_var($key,$default = "")
 {
    if(isset($_POST[$key]))
    {
        return $_POST[$key];
    }


    return $default;//return the value from the database,if any
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
    


    return $value;

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

 function getTimeSlot($interval, $start_time, $end_time)
{
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    
    $startTime = $start->format('H:i');
    $endTime = $end->format('H:i');
    $i=0;
    $time = [];
    while(strtotime($startTime) <= strtotime($endTime)){
        $start = $startTime;
        $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
        $startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
        $i++;
        if(strtotime($startTime) <= strtotime($endTime)){
            $time[$i]['slot_start_time'] = $start;
            $time[$i]['slot_end_time'] = $end;
        }
    }
    return $time;
}