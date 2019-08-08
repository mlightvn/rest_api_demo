<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Traits\EmployeeTrait;

class Employee extends BaseModel
{
	use EmployeeTrait;

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
