<?php

class admin extends Model
{
    protected $table = "admin";

    //columns which are allowed to edit
    protected $allowedcolumns = [
		'fname',
		'lname',
        'username',
        'email',
		'password',
    ];

	  protected $pk = "adminid";
    
}
   
