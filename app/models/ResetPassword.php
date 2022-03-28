<?php

class resetpassword extends Model
{

	protected $allowedcolumns = [
		'resetEmail',
        'resetSelector',
        'resetTocken',
        'resetExpires',	
	];

    protected $table = "resetpassword";
	protected $pk = "resetid";

    
}