<?php

namespace App\Widgets\Employee;

use Arrilot\Widgets\AbstractWidget;

class Listing extends AbstractWidget
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
        //

        return view('widgets.employee.listing', [
            'config' => $this->config,
        ]);
    }
}
