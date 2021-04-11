<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicioModel;
use App\Models\ProveedorModel;
use App\Models\CategoriaServicioModel;

class Servicio extends BaseController{

    protected $servicios;

    //relación controlador-modelo
    public function __construct()
    {
        $this->servicios = new ServicioModel($db);
    }

    //prueba de muestra de datos desde base de datos
    // public function index(){

    //     $servicios = $this->servicios->find('44');
    //     var_dump($servicios);
    // }

    //relacion controlador-vista
    public function index($activo = 1){

        $servicios = $this->servicios->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Servicios', 'datos'=> $servicios]; 

        echo view('header');
        echo view('servicios/servicios', $data);
        echo view('footer');
    }

    public function nuevoServicio(){

        $modelProv = new ProveedorModel();
        $modelCatServ = new CategoriaServicioModel();

        $data = [ 'titulo' => 'Agregar Servicio',
                  'proveedor' => $modelProv->getProveedor(),
                  'categoria' => $modelCatServ->getCategoriaServicio(),
                ];

        echo view('header');
		echo view('servicios/nuevoServicio',$data);
		echo view('footer');
    }
    public function insertar(){

        $index= new Servicio;

        $modelServicio = new ServicioModel($db);
		
        $request = \Config\Services::request();
		
        $data = [
			'id_proveedor'=>$request->getPostGet('proveedor'),
			'id_categoria_servicio'=>$request->getPostGet('categoria_servicio'),
			'matricula'=>$request->getPostGet('matricula'),
			'nombre_fantacia'=>$request->getPostGet('nombre')
        ];
		
		
		if($modelServicio->insert($data)===false){
			var_dump($modelServicio->errors());
			$this->nuevoServicio();
		}else{
            
            $mostrar = $index->index();
            return $mostrar; 
            // $activo = 1;
            // $servicios = $modelServicio->where('activo',$activo)->findAll();
            // $dataServicio = array('titulo' => 'Servicios', 'datos'=>$servicios);
			// echo view('header');
			// echo view('servicios/servicios', $dataServicio);
			// echo view('footer');
            
		}
    }

    public function editarServicio($id){

        $modelProv = new ProveedorModel();
        $modelCatServ = new CategoriaServicioModel();


        $servicios = $this->servicios->where('id_servicio',$id)->first();

        $data = [
            'titulo' => 'Editar Servicio', 
            'proveedor' => $modelProv->getProveedor(),
            'categoria' => $modelCatServ->getCategoriaServicio(),
            'datos' => $servicios
        ];

        //var_dump($data);

        echo view('header');
        echo view('servicios/editarServicio', $data);
        echo view('footer');

    }
    public function actualizar(){

        $index= new Servicio;

        $modelServicio = new ServicioModel($db);
		
        $request = \Config\Services::request();
		
        $id = $request->getPostGet('id');
        $data = [
			'id_proveedor'=>$request->getPostGet('proveedor'),
			'id_categoria_servicio'=>$request->getPostGet('categoria_servicio'),
			'matricula'=>$request->getPostGet('matricula'),
			'nombre_fantacia'=>$request->getPostGet('nombre')
        ];
		
        $modelServicio->update($id,$data);
            
        $mostrar = $index->index();
        return $mostrar; 
            
    }

    // funcion para ver un servicio especifico
	public function view($id = null)
    {
        
		$servicio = $this->servicios->getServicio($id);
		
		$data = [
			'titulo' => 'Servicio',
			'datos' => $servicio
		];
		
		echo view('header');
		echo view('servicios/unServicio',$data);
		echo view('footer');
    }

    
}

?>