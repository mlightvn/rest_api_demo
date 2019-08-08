<?php

namespace App\Model;

use App\Model\BaseModel

class Employee extends BaseModel
{
	protected $fillable = [
		'id',
		'firstname',
		'lastname',
		'birthday',
		'address',
		'boss',
		'salary',
	];
}
