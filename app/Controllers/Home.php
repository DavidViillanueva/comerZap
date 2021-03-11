<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//echo( view('header.php'));
		//echo( view('comercios.php'));
		echo view('servicios/servicios');
		//echo( view('footer.php'));
	}

	//--------------------------------------------------------------------

}
