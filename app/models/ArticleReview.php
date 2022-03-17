<?php

class articleReview extends Model
{
    protected $allowedcolumns = [
		'articleName',
		'reviewOwner',
        'review',
        'articleid',
        'ownerid',
	];

    protected $table = "articlereviews";
	protected $pk2 = "articleid";
	protected $pk = "reviewid";
}