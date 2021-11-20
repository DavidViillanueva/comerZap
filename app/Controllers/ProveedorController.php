<?php namespace App\Controllers;

use App\Controllers\BaseController;

class ProveedorController extends BaseController {

    public function createProveedor ($type = null) {
        if ( $this->request->getMethod() === 'get' ) {
            if( $type == "1") {
                echo view('header');
                echo view('proveedor/form_feriante');
                echo view('footer');
            }
            if( $type == "2") {
                echo view('header');
                echo view('proveedor/form_servicio');
                echo view('footer');
            }
            if( $type == '3') {
                echo view('header');
                echo view('proveedor/form_comercio');
                echo view('footer');
            }
            if($type == null){

                echo view('header');
                echo view('proveedor/createProveedorView');
                echo view('footer');
            }
        }
    }


}