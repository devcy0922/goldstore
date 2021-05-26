<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Report extends BaseController
{
	public function index()
	{
		return $this->recentDetection();
	}

    /**
     * 탐지현황
     */
    public function recentDetection()
    {
        return $this->render->view('report/recentDetection');
	}

    /**
     * 신고현황
     */
    public function recentReport()
    {
        return $this->render->view('report/recentReport');
    }
}
