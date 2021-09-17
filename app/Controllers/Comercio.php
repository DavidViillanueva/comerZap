<?php namespace App\Controllers;


//use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\ComercioModel;
use App\Models\ProveedorModel;
use App\Models\DomicilioModel;
use App\Models\CategoriaComercioModel;


class Comercio extends BaseController
{
	protected $comercios;
	public function __construct(){
		$this->comercios = new ComercioModel($db);
	}
	//index para el usuario cliente
	public function index($activo = 1)
	{
		$comercios = $this->comercios->where('activo', $activo)->findAll();
		$data = ['titulo'=>'Comercios', 'datos'=>$comercios];	
		echo view('header');
		//echo view('comercio/VistaComercio', $comercios);
		echo view('comercio/Comercio', $data);
		echo view('footer');
	}
	//
	public function comercioAdmin($activo = 1){
		$comercios = $this->comercios->where('activo', $activo)->findAll();
		$data = ['titulo'=>'Comercios Administrador', 'datos'=>$comercios];	
		echo view('header');
		//echo view('comercio/VistaComercio', $comercios);
		echo view('comercio/comercioAdmin', $data);
		echo view('footer');
	}

	public function crear(){
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
	public function guardar(){
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
			'activo'=> 0,
		);
		if($modelComercio->insert($data)===false){
			var_dump($modelComercio->errors());
			$this->crear();
		}else{
            return redirect()->route('comercio-admin');
		}	
		
	}
	public function editar($id){
		//$modelComercio = new ComercioModel($db);
		$modelP = new ProveedorModel();
		$modelD = new DomicilioModel();
		$modelCC = new CategoriaComercioModel();

		//$request = \Config\Services::request();
		//$id=$request->getPostGet('id');//
		$comercios = $this->comercios->where('id_comercio', $id)->first();
		//$model = array('model'=>$model);
		$data = [
			'titulo' => 'Editar Comercio',
			'proveedor' => $modelP->getProveedor(),
			'domicilio' => $modelD->getDomicilio(),
			'categoria' => $modelCC->getCategoriaComercio(),
			'datos'=> $comercios,
		];
		echo view('header');
		echo view('comercio/ModificarComercio', $data);
		echo view('footer');
	}
	public function actualizar(){
		//$index = new Comercio;
		$modelComercio = new ComercioModel($db);
		$request = \Config\Services::request();
		$id = $request->getPostGet('id');
		$data = ['id_proveedor'	=> $request->getPostGet('id_proveedor'),'id_domicilio'=> $request->getPostGet('id_domicilio'),'id_categoria'			=> $request->getPostGet('id_categoria'),'nombre_comercio'=> $request->getPostGet('nombre_comercio'),'delivery'=> $request->getPostGet('delivery')];
		var_dump($data);
		var_dump($modelComercio->update($id, $data));
		$data = ['licencia_comercial'=>$request->getPostGet('licencia_comercial'),'pagina_web'=> $request->getPostGet('pagina_web'),'mail'=> $request->getPostGet('mail'),'descripcion'=> $request->getPostGet('descripcion'),'activo'=> $request->getPostGet('activo')];
		var_dump($data);
		var_dump($modelComercio->update($id, $data));
		//$mostrar = $index->index();
        //return $mostrar; 
		return redirect()->route('comercio-admin');
	}
	public function borrar(){
		//$index = new Comercio;
		$modelComercio = new ComercioModel($db);
		$request = \Config\Services::request();
		$id=$request->getPostGet('id');
		$data = [ 'activo'=> 0];
		$modelComercio->update($id, $data);
		//$mostrar = $index->index();
        //return $mostrar; 
		return redirect()->route('comercio-admin');
	}
	//--------------------------------------------------------------------

}