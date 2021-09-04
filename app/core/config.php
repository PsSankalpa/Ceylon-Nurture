<?php
//set the website title
define("WEBSITE_TITLE","my_website");

//set database variable
define('DB_TYPE','mysql');
define('DB_NAME','ceylon_nurture_db');
define('DB_USER','root');
define('DB_PASS','');
define('DB_HOST','localhost');

//protocol type http or https, that we use
define('PROTOCAL','http');

//root and assets paths
$path = str_replace("\\","/",PROTOCAL."://". $_SERVER['SERVER_NAME']. __DIR__."/");//tell what the root folder,shos the path to public folder
 // check the server and check the directory that contain the file form "__DIR__"
$path = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path);//contain the path for assets folder
//server name of the documet root

define('ROOT',str_replace("app/core","public",$path));
define('ASSETS',str_replace("app/core","public/assets",$path));

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

?>