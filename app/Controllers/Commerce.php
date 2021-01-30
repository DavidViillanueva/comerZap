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

		echo view('header');
		echo view('commerce/overviewCommerce',$data);
		echo view('footer');
		
	}


	// funcion para ver un comercio especifico
	public function view($id = null)
    {
        $model = new CommerceModel();
		$commerce = $model->getCommerce($id);
		
		$data = [
			'title' => 'Comercio',
			'commerce' => $commerce
		];
		
		echo view('header');
		echo view('commerce/commerce',$data);
		echo view('footer');
    }

	//--------------------------------------------------------------------

}
