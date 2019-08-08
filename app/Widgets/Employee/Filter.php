<?php

namespace App\Widgets\Employee;

use App\Model\Employee;
use Illuminate\Http\Request;
use Arrilot\Widgets\AbstractWidget;

class Filter extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $employee = new Employee();
        $employee->fill(request()->all());
        $this->config["employee"] = $employee;

        return view('widgets.employee.filter', $this->config);
    }
}
