<?php

class forumreplyproduct extends Model
{

	protected $allowedcolumns = [
		'forumProductid',
		'reply',
        'userid',
	];

	protected $table = "forumreplyproduct";
	protected $pk = "replyid";
}