<?php
//if you add a new file int, ypu need to add it here

require "app/core/config.php";
require "app/core/functions.php";
require "app/core/database.php";
require "app/core/model.php";
require "app/core/controller.php";
require "app/core/app.php";




//from below function it search for the relevant model file which called by relevant controller file 
spl_autoload_register(function($class_name)
{
    require "app/models/". ucfirst($class_name) . ".php";
});
?> 