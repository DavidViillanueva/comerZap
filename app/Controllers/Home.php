<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo( view('header.php'));
		echo( view('welcome_message') );
		echo( view('footer.php'));
	}

	//--------------------------------------------------------------------

}
