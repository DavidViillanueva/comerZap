<?php namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\RubroModel;
use App\Models\ProveedorModel;

class ProveedorController extends BaseController {
    
    public function createProveedor ($type = null) {
        $rubrosModel = new RubroModel($db);
        if ( $this->request->getMethod() === 'get' ) {
            $rubros = $rubrosModel->getRubros();
            $data = [
                'rubros' => $rubros
            ];

            if($_SESSION['proveedor']){
                if( $type == null ) {
                    echo view('header');
                    echo view('proveedor/createProveedorView',$data);
                    echo view('footer');
                }
            } else {
                if( $type == null ) {
                    echo view('header');
                    echo view('proveedor/form_proveedor',$data);
                    echo view('footer');
                }
            }
        }

        if( $this->request->getMethod() === 'post') {

            $cuilt = $this->request->getPostGet('cuilt');
            $rubro = $this->request->getPostGet('rubro');
            $plocal = $this->request->getPostGet('plocal');

            if( $plocal === "on") {
                $plocal = true;
            } else {
                $plocal = false;
            }

            $_SESSION['cuilt'] = $cuilt;
            $_SESSION['rubro'] = $rubro;
            $_SESSION['plocal'] = $plocal;


            $this->loadProveedor($cuilt, $rubro, $plocal);
            
            echo view('header');
            echo view('proveedor/createProveedorView');
            echo view('footer');
        }
    }

    public function loadProveedor( $cuilt , $rubro , $plocal ) {
        $persona = $_SESSION['persona'];
        $personaId = $persona['id_persona'];
        $proveedorModel = new ProveedorModel($db);
        try {
            $proveedorId = $proveedorModel->insert([
                'id_persona' => $personaId, 
                'Id_rubro' => $rubro,
                'cuil_cuit' => $cuilt, 
                'ventas_concretadas' => 0,
                'suma_puntaje' => 0, 
                'status_proveedor' => 2, 
                'id_estado' => 4, 
                'productor_local' => $plocal
            ]);
            $_SESSION['proveedorId'] = $proveedorId;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


}