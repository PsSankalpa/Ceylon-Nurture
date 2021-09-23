<?php

class upload_file
{
    function upload($POST,$FILES)
    {
        $db = new Database();
        $_SESSION['error'] = "";//show the error

        //to check for errors
        //allowed file types
        $allowed[] = "image/jpeg";

        if(isset($POST['title']) && isset($FILES['file']))
        {
            
            //check for file name is not empty,check is there any error,look for file type in the array and the array name
            if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0 && in_array($FILES['file']['type'], $allowed))
            {
                //upload the file to following dir
                $folder = "uploads/";
                if(!file_exists($folder))//if dir doesn't exist,create it like below with file permissions
                {
                    mkdir($folder,0777,true);
                }

                //create the destination 
                $destination = $folder . $FILES['file']['name'];
                //create a folder where images need to send
                move_uploaded_file($FILES['file']['tmp_name'], $destination);
            }else
            {
                $_SESSION['error'] = "cannot upload";
            }

            if($_SESSION['error']=="")
            {

               
            }
        }

        /* //save to the db

                $arr['title'] = $POST['title'];
                $arr['description'] = $POST['description'];
                $arr['date'] = date('Y-m-d H:i:s');
                $arr['image'] = $destination;

                $query = "insert into images (title,description,date,image) values (:title,:description,:date,:image)";
				$data = $db->write($query,$arr);//return array of objects
                if ($data)//check if the data come as an array
                {
                    header("Location:".ROOT."home");
                    die;

                }*/


        
    }
}
?>