<?php
/**
 * Te3mp Donation Model
 */
class tempdonations extends Model
{
    protected $table = "tempdonations";

    protected $allowedcolumns = [
        'date',
        'userid',
    ];

	protected $pk = "donationid";

}