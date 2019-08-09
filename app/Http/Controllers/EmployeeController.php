<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Model\Employee;

class EmployeeController extends BaseController {

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/employee
	 * 
	 * @return [json] List of employees
	 */
	public function index()
	{
		$list = Employee::search($this->request)->orderBy("created_at", "DESC")->paginate(20);

		return view("employee.index", ["list"=>$list]);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/employee/1
	 * 
	 * @return [json] show detail of an employee
	 */
	public function show(Employee $employee)
	{
		return view("employee.show", ["employee"=>$employee]);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/employee/{employee_id}
	 * 
	 * @return [json] Open creating page of employee
	 */
	public function create()
	{
		return view("employee.edit", ["employee"=>(new Employee())]);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/employee/create
	 * Method: POST
	 * 
	 * @return [json] Create new instance of an employee
	 */
	public function store(Request $request)
	{
		$model = new Employee();
		$model->fill($request->all());
		$id = $model->save();

		$result["id"] = $id;

		return response()->json($result);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/employee/{employee_id}
	 * 
	 * @return [json] Open editing page of employee
	 */
	public function edit(Employee $employee)
	{
		return view("employee.edit", ["employee"=>$employee]);
	}

	/**
	 * Example URL: http://wealthpark.miko.nam/employee/{employee_id}
	 * Method: PUT
	 * 
	 * @return [json] Update an employee
	 */
	public function update(Request $request, Employee $employee)
	{
		$employee->fill($request->all());
		$result = $employee->update();

		return redirect("employee");
	}

	public function destroy(Employee $employee)
	{
		$result = $employee->delete();
		return redirect("employee");
	}

}
