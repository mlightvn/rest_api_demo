<?php
namespace App\Model\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

trait EmployeeTrait
{

	public function scopeSearch($query, Request $request)
	{
		if(!is_null($request->id))
		{
			$query->where('id', $request->id);
		}

		if(!is_null($request->firstname))
		{
			$query->where('firstname', 'LIKE', '%' . $request->firstname . '%');
		}

		if(!is_null($request->lastname))
		{
			$query->where('lastname', 'LIKE', '%' . $request->lastname . '%');
		}

		if(!is_null($request->address))
		{
			$query->where('address', 'LIKE', '%' . $request->address . '%');
		}

		if(!is_null($request->boss))
		{
			$query->where('boss', 'LIKE', '%' . $request->boss . '%');
		}

		if(!is_null($request->salary))
		{
			$query->where('salary', '=', $request->salary);
		}

		if(!is_null($request->birthday))
		{
			$query->whereDate('birthday', '=', $request->birthday);
		}

		$query->whereNull('deleted_at');

		return $query;
	}

}
