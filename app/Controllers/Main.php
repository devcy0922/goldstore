<?php

namespace App\Controllers;

class Main extends BaseController
{
	public function index()
	{
        return $this->render->view("main/main");
	}
}
