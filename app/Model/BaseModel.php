<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Traits\BaseTrait

class BaseModel extends Model
{
	use SoftDeletes, BaseTrait;

}
