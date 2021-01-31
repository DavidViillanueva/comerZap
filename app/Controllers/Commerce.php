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
<<<<<<< HEAD
		echo view('comercios');
		//echo view('prueba');
=======
		echo view('commerce/overviewCommerce',$data);
>>>>>>> a4213eeed4220a573c8cbe3fdf98a2af3a0fc137
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
