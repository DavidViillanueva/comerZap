<?php 
namespace App\Controllers;

use CodeIgniter\HTTP\Message;
use CodeIgniter\Controller;
use App\Models\ProvinciasModel;
use App\Models\LocalidadesModel;


use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use Psr\Log\LoggerInterface;

use Config\Logger;

class authController extends BaseController {

    public function profile () {
        echo view('header');
        echo view('usuarios/perfil');
        echo view('footer');
    }


    public function getLocalidades () {
        $localidades = "";
        $ModelLocalidades = new LocalidadesModel($db);

        $id = $this->request->getVar('id_provincia');

        if( $id) {
            $localidades = $ModelLocalidades->getLocalidades($id);

            return $this->response->setJSON($localidades);
        }
    }
}
