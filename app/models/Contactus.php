<?php
/**
 *Contact Us Model
 */
class contactus extends Model
{
    protected $table = "contactus";

    protected $allowedcolumns = [
        'fullname',
        'email',
		'message',
    ];

	protected $pk = "contactusID";

}