<?php

class forumreplydoctor extends Model
{

	protected $allowedcolumns = [
		'forumDoctorid',
		'reply',
        'userid',
	];

	protected $table = "forumreplydoctor";
	protected $pk = "replyid";
}