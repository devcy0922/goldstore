<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Statistics extends BaseController
{
	public function index()
	{
        return $this->render->view('statistics/statistics');
	}
}
