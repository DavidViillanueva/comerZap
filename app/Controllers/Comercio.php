<?php namespace App\Controllers;


//use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\ComercioModel;
use App\Models\ProveedorModel;
use App\Models\DomicilioModel;
use App\Models\CategoriaComercioModel;
use App\Models\LogoComercioModel;
use App\Config\Image;


class Comercio extends BaseController
{
	protected $comercios;
	protected $imgComercios;
	public function __construct(){
		$this->comercios = new ComercioModel($db);
		$this->imgComercios = new LogoComercioModel($db);
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
	//el admin deberia poder ver todos los comercios, los que esten de baja y los que no
	public function comercioAdmin(/*$activo = 1*/){
		
		$comercios = $this->comercios->paginate(5);//->findAll()->where('activo', $activo)->findAll()
		$imgC = $this->imgComercios->findAll();
		$paginador = $this->comercios->pager;
		$data = ['titulo'=>'Comercios Administrador', 'datos'=>$comercios, 'paginador'=>$paginador, 'imgCom'=>$imgC];
		echo view('header');
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
		
		if($modelComercio->insert($data)){//se inserta y si es verdadero, inserta la imagen ¡¡solucionar aca, que si falla la carga del logo, no se inserte el usuario!!
			$idLogo = $modelComercio->insertID;//obtengo el ultimo id, para realizar la carga del logo
			$res = $this->_uploadLogo($idLogo);
			if($res===true){
				return redirect()->route('comercio-admin');
			}else{
				echo $res;
			}
		}else{
			var_dump($modelComercio->errors());
			$this->crear();
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

	private function _uploadLogo($id){
		//image/jpg,image/jpeg,
		if($imageFile = $this->request->getFile('logo')){
			//echo "paso por aca 1<br>";
			if ($imageFile->isValid() && !$imageFile->hasMoved()) {
				//echo "paso por aca 2<br>";
				$validated = $this->validate ([
					'logo' => [
						'uploaded[logo]',
						'mime_in[logo,image/jpg,image/jpeg,image/png,image/gif]'
					]
				]);
				if($validated){
					//echo "llego aca bien, ok<br>";
					$modelLogo = new LogoComercioModel($db);
					$file_type = $imageFile->getClientMimeType();
					$newName = $imageFile->getRandomName();
					//$imageFile->move(WRITEPATH.'uploads/imgComercios/logoComercio/', $newName);//con el $id, estoy indicando que comercio tiene que logo
					$imageFile->move(ROOTPATH.'public/uploads', $newName);
					$dataLogo = array(
						'id_comercio' => $id,
						'tipo_imagen' => $file_type,
						'imagen' => $newName,
					);
					$modelLogo->insert($dataLogo);					
					return true;
				}else{
					//echo "Hubo error, pasa por aca<br>";
					return $this->validator->getError("logo");
					//return false;
				}
				//echo WRITEPATH;
				//$newName = $imageFile->getRandomName();
				//$imageFile->move(WRITEPATH.'uploads/imgComercios/logoComercio/'.$id, $newName);//con el $id, estoy indicando que comercio tiene que logo
			}
		}

	}
	//--------------------------------------------------------------------

}