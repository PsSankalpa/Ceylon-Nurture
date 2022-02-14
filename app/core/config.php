<?php
//set the website title
define("WEBSITE_TITLE","my_website");

//set database variable
define('DB_TYPE','mysql');
define('DB_NAME','ceylon_nurture_db');
define('DB_USER','root');
define('DB_PASS','ceylonG12$$prg');
define('DB_HOST','localhost');

//protocol type http or https, that we use
define('PROTOCAL','http');

//root and assets paths
$path = str_replace("\\","/",PROTOCAL."://". $_SERVER['SERVER_NAME']. __DIR__."/");//tell what the root folder,shos the path to public folder
 // check the server and check the directory that contain the file form "__DIR__"
$path = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);//contain the path for assets folder
//server name of the documet root

//define('ROOT',str_replace("app/core","public",$path));
//define('ASSETS',str_replace("app/core","public/assets",$path));
//define('ASSETS2',str_replace("app/core","public",$path));

// for the server
// define('ROOT', PROTOCAL."://". $_SERVER['SERVER_NAME'].'/');
// define('ASSETS', PROTOCAL."://". $_SERVER['SERVER_NAME'].'/assets/');
// define('ASSETS2', PROTOCAL."://". $_SERVER['SERVER_NAME'].'/');
if(PROTOCAL=='http')
{
    define('ROOT', 'http://localhost/Grp12/public/');
    define('ASSETS', 'http://localhost/Grp12/public/assets/');
    define('ASSETS2', 'http://localhost/Grp12/public/');
}
elseif(PROTOCAL=='https')
{
    define('ROOT', PROTOCAL."://". $_SERVER['SERVER_NAME'].'/');
    define('ASSETS', PROTOCAL."://". $_SERVER['SERVER_NAME'].'/assets/');
    define('ASSETS2', PROTOCAL."://". $_SERVER['SERVER_NAME'].'/');
}

/*set to true to allow error reporting and set to false when you upload online to stop error repoting
,this show the errors*/
define('DEBUG',true);

if(DEBUG)
{
    ini_set("display_errors",1);//if debug is true this show errors
}
else
{
    ini_set("display_errors",0);
}


// Create a custom error handler
function custom_error($error_no, $error, $filename, $linenumber)
{
    // get today date, saving logs for each day
    $today = date("Y-m-d");
 
    // Creating array for possible errors
    $error_levels = array(
        "1" => "Fatal error",
        "2" => "Warning",
        "8" => "Error",
        "1024" => "Custom error"
    );
     
    // Getting name of error by error level
    $str = $error_levels[$error_no] . ": ";
 
    // Display file name where error occurred
    $str .= $error . " in " . $filename;
 
    // Show line number which causes error
    $str .= " at " . $linenumber;
 
    // Moving to next line
    $str .= "\n";
 
    // Display error in browser
    //echo $str;
 
    // save the $str value in file
    file_put_contents("error_logs/" . $today . ".txt", $str, FILE_APPEND);

    //send email of the error
    $to = "ceylonnurture@gmail.com";
    $subject = "Page Error ".$error_levels[$error_no];
    $txt = $str;
    $headers = "From: Ceylon Nurture";

    //mail($to,$subject,$txt,$headers);
}

// Tells PHP to use custom error handler for errors
//set_error_handler("custom_error");


?>