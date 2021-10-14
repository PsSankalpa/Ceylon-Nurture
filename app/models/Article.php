<?php

class article extends Model
{
    protected $table = "articles";

    public function validate()
	{
        return true;
    }

}