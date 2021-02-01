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
		//La vista overviewCommerce tiene todos los comercios
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
		//La vista commerce tiene la data de un solo comercio
		//no cambies esta movida migue, usa estos archivos, y si vas a hacer pruebas usa otro proyecto
		//porque despues subis tus pruebas y es al pedo, no todos probamos lo mismo, y no todos 
		//queremos ver tus pruebas
		echo view('commerce/commerce',$data);
		echo view('footer');
    }

	//--------------------------------------------------------------------

}
