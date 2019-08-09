<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Model\Employee;

class EmployeeController extends BaseController {
	protected $modelClassName;

	public function __construct(Request $request)
	{
		$this->request = $request;

		$this->init();
	}

	public function init()
	{
		$this->modelClassName = "\App\Model\Employee";
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/api/employee
	 * 
	 * @return [json] List of employees
	 */
	public function index()
	{
		$list = $this->modelClassName::search($this->request)->orderBy("created_at", "DESC")->paginate(20);

		return response()->json($list);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/api/employee/1
	 * 
	 * @return [json] show detail of an employee
	 */
	public function show(Employee $employee)
	{
		return response()->json($employee);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/api/employee/create
	 * Method: POST
	 * 
	 * @return [json] Create new instance of an employee
	 */
	public function store(Request $request)
	{
		$model = Employee::create($request->all());
		$saved_result = $model->save();

		$result["model"] = $model;
		$result["request"] = $request->all();
		$result["result"] = $saved_result;

		return response()->json($result);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/api/employee/{employee_id}
	 * Method: PUT
	 * 
	 * @return [json] Update an employee
	 */
	public function update(Request $request, Employee $employee)
	{
		$employee->fill($request->all());
		$result = $employee->update();

		return response()->json($result);
	}

	public function destroy(Employee $employee)
	{
		$result = $employee->delete();

		return response()->json($result);
	}

}
