<?php

class forumreplyherb extends Model
{

	protected $allowedcolumns = [
		'forumHerbid',
		'reply',
        'userid',
	];

	protected $table = "forumreplyherb";
	protected $pk = "replyid";
}