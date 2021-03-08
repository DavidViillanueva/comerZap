<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServicioModel;

class Servicio extends BaseController{

    protected $servicios;

    //relación controlador-modelo
    public function __construct()
    {
        $this->servicios = new ServicioModel();
    }

    //relacion controlador-vista
    public function index($activo = 1){

        $servicios = $this->servicios->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Servicios', 'datos'=> $servicios];

        echo view('header');
        echo view('servicios/servicios', $data);
        echo view('footer');
    }

}

?>