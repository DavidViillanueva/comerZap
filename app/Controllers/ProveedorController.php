<?php namespace App\Controllers;

use App\Controllers\BaseController;

class ProveedorController extends BaseController {

    public function createProveedor () {
        if ( $this->request->getMethod() === 'get' ) {
            echo view('header');
            echo view('proveedor/createProveedorView');
            echo view('footer');
        }
    }

}