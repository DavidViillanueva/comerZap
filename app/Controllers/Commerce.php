<?php namespace App\Controllers;


use CodeIgniter\Controller;

use App\Models\CommerceModel;

class Commerce extends Controller
{

	
	public function index()
	{
		$model = new CommerceModel(); 


		$data = [
			'commerce' => $model->getCommerce(),
			'title' => 'Comercios'
		];

		echo view('header',['title' => 'Homepage']);
		echo view('comercios');
		echo view('footer');
		
	}

	//--------------------------------------------------------------------

}
