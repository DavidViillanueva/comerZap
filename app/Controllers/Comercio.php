<?php namespace App\Controllers;


use CodeIgniter\Controller;

use App\Models\ComercioModel;
use App\Models\ProveedorModel;
use App\Models\DomicilioModel;
use App\Models\CategoriaComercioModel;


class Comercio extends Controller
{

	
	public function index()
	{
		$model = new ComercioModel($db); //se inicializa una instancia de el modelo
		
		//$data = [
			//'commerce' => $model->getCommerce(),
			//$comercios = $model->find([4,5,6]);
			$comercios = $model->findAll();
			$comercios = array('comercios'=>$comercios);
			//'title' = 'Comercios',
		//];

		echo view('header');
		echo view('comercio/VistaComercio', $comercios);
		echo view('footer');
		
		
	}
	public function create(){
		$modelP = new ProveedorModel($db);
		$modelD = new DomicilioModel($db);
		$modelCC = new CategoriaComercioModel($db);

		$data = [
			'proveedor' => $modelP->getProveedor(),
			'domicilio' => $modelD->getDomicilio(),
			'categoria' => $modelCC->getCategoriaComercio(),
		];
		echo view('header');
		echo view('comercio/CrearComercio', $data);
		echo view('footer');
	}
	public function save(){
		$modelComercio = new ComercioModel($db);
		$request = \Config\Services::request();
		$data = array(
			'id_proveedor'=>$request->getPostGet('id_proveedor'),
			'id_domicilio'=>$request->getPostGet('id_domicilio'),
			'id_categoria'=>$request->getPostGet('id_categoria'),
			'nombre_comercio'=>$request->getPostGet('nombre_comercio'),
			'delivery'=>$request->getPostGet('delivery'),
			'licencia_comercial'=>$request->getPostGet('licencia_comercial'),
			'pagina_web'=>$request->getPostGet('pagina_web'),
			'mail'=>$request->getPostGet('mail'),
			'descripcion'=>$request->getPostGet('descripcion'),
		);
		
		
		if($modelComercio->insert($data)===false){
			var_dump($modelComercio->errors());
			$this->create();
		}else{
			$comercios = $modelComercio->findAll();
			$comercios = array('comercios'=>$comercios);
			echo view('header');
			echo view('comercio/VistaComercio', $comercios);
			echo view('footer');
		}	
		
	}
	public function edit(){
		$modelComercio = new ComercioModel($db);
		$modelP = new ProveedorModel($db);
		$modelD = new DomicilioModel($db);
		$modelCC = new CategoriaComercioModel($db);


		$request = \Config\Services::request();
		$id=$request->getPostGet('id');//
		
		//$model = array('model'=>$model);
		$model = [
			'model' => $modelComercio->find([$id]),//busco el id
			//'model' = array('models'=>$data),
			'proveedor' => $modelP->getProveedor(),
			'domicilio' => $modelD->getDomicilio(),
			'categoria' => $modelCC->getCategoriaComercio(),
		];
		//$model = array('model'=>$data);
		//var_dump($model);
		echo view('header');
		echo view('comercio/ModificarComercio',$model);
		echo view('footer');
	}
	public function update(){
		$modelComercio = new ComercioModel($db);
		$request = \Config\Services::request();
		$data = array(
			'id_proveedor'=>$request->getPostGet('id_proveedor'),
			'id_domicilio'=>$request->getPostGet('id_domicilio'),
			'id_categoria'=>$request->getPostGet('id_categoria'),
			'nombre_comercio'=>$request->getPostGet('nombre_comercio'),
			'delivery'=>$request->getPostGet('delivery'),
			'licencia_comercial'=>$request->getPostGet('licencia_comercial'),
			'pagina_web'=>$request->getPostGet('pagina_web'),
			'mail'=>$request->getPostGet('mail'),
			'descripcion'=>$request->getPostGet('descripcion'),
		);
		if($request->getPostGet('id')){
			$data['id_comercio'] = $request->getPostGet('id');
		}
		$modelComercio->save($data);
		$comercios = $modelComercio->findAll();
		$comercios = array('comercios'=>$comercios);
		echo view('header');
		echo view('comercio/VistaComercio', $comercios);
		echo view('footer');
	}
	public function delete(){
		$modelComercio = new ComercioModel($db);
		$request = \Config\Services::request();
		$id=$request->getPostGet('id');
		$modelComercio->delete($id);
		$comercios = $modelComercio->findAll();
		$comercios = array('comercios'=>$comercios);
		echo view('header');
		echo view('comercio/VistaComercio', $comercios);
		echo view('footer');
	}
	//--------------------------------------------------------------------

}