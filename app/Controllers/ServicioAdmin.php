<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicioModel;
use App\Models\ProveedorModel;
use App\Models\CategoriaServicioModel;


class ServicioAdmin extends BaseController{

    protected $serviciosAdmin;

    //relación controlador-modelo
    public function __construct()
    {
        $this->serviciosAdmin = new ServicioModel($db);
    }

    //prueba de muestra de datos desde base de datos
    // public function index(){

    //     $servicios = $this->servicios->find('44');
    //     var_dump($servicios);
    // }

    //relacion controlador-vista, muestra todos los servicios activos ('1') de la base de datos
    public function index($activo = 1){

        $serviciosAdmin = $this->serviciosAdmin->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Servicios Admin', 'datos'=> $serviciosAdmin]; 

        echo view('header');
        echo view('servicios/servicioAdmin', $data);
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

        $index= new ServicioAdmin;

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
            // $serviciosAdmin = $modelServicio->where('activo',$activo)->findAll();
            // $dataServicio = array('titulo' => 'Servicios', 'datos'=>$servicios);
			// echo view('header');
			// echo view('servicios/serviciosAdmin', $dataServicio);
			// echo view('footer');
            
		}
    }

    public function editarServicio($id){

        $modelProv = new ProveedorModel();
        $modelCatServ = new CategoriaServicioModel();


        $serviciosAdmin = $this->serviciosAdmin->where('id_servicio',$id)->first();

        $data = [
            'titulo' => 'Editar Servicio', 
            'proveedor' => $modelProv->getProveedor(),
            'categoria' => $modelCatServ->getCategoriaServicio(),
            'datos' => $serviciosAdmin
        ];

        //var_dump($data);

        echo view('header');
        echo view('servicios/editarServicio', $data);
        echo view('footer');

    }
    public function actualizar(){

        $index= new ServicioAdmin;

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

    //no se elimina de la base de datos, solo se actualiza su estado de '1' a '0' para que no aparezca en la pagina web
    public function eliminarServicio(){

        $index= new ServicioAdmin;

        $modelServicio = new ServicioModel($db);
		
        $request = \Config\Services::request();
		
        $id = $request->getPostGet('id');
        $data = [ 'activo'=>0 ];
		
        $modelServicio->update($id,$data);
            
        $mostrar = $index->index();
        return $mostrar; 
            
    }

}

?>