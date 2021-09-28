<?php 
namespace App\Controllers;

use CodeIgniter\HTTP\Message;
use CodeIgniter\Controller;
use App\Models\ProvinciasModel;
use App\Models\LocalidadesModel;
use App\Models\personaModel;
use App\Models\DomicilioModel;


use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\IncomingRequest;
use Psr\Log\LoggerInterface;

use Config\Logger;

class authController extends BaseController {

    protected $personas;
	public function __construct(){
		$this->personas = new personaModel($db);
	}

    public function profile () {

        $personas = new personaModel($db);
        $domicilioModel = new DomicilioModel($db);
        
        $isComplete = $personas->isComplete(user()->id);
        $data = [
            'isComplete' => $isComplete
        ];


        if( $isComplete ){
            $persona = $personas->getPersonaByUser(user()->id);
            $domicilio = $domicilioModel->getDomicilio( $persona['id_domicilio'] );
    
            
            $_SESSION['persona'] = $persona;
            $_SESSION['domicilio'] = $domicilio;
        }

        echo view('header');
        echo view('usuarios/perfil',$data);
        echo view('footer');
    }
    
    public function completeProfile () {
        log_message(3,'la concha de tu madre');
        $personasModel = new personaModel($db);
        $domicilioModel = new domicilioModel($db);
        $data = [
            'nombre' => $this->request->getPostGet('nombre'),
            'apellido' => $this->request->getPostGet('apellido'),
            'dni' => $this->request->getPostGet('dni'),
            'fechaNacimiento' => $this->request->getPostGet('fechaNacimiento'),
            'barrio' => $this->request->getPostGet('barrio'),
            'calle' => $this->request->getPostGet('calle'),
            'altura' => $this->request->getPostGet('altura'),
            'piso' => $this->request->getPostGet('piso'),
            'dpto' => $this->request->getPostGet('dpto'),
            'postal' => $this->request->getPostGet('postal'),
            'genero' => $this->request->getPostGet('sexo'),
        ];

        $validation =  \Config\Services::validation();

        $validation->reset();

        $validation->setRules([
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un nombre.'
                ]
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un apellido.'
                ]
            ],
            'dni' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un dni.'
                ]
            ],
            'fechaNacimiento' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un fechaNacimiento.'
                ]
            ],
            'barrio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un barrio.'
                ]
            ],
            'calle' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un calle.'
                ]
            ],
            'altura' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un altura.'
                ]
            ],
            'postal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes ingresar un postal.'
                ]
            ]
        ]);



        if ( $validation->run($data) && $this->request->getMethod() === 'post') {
                try {
                    $domicilioId = $domicilioModel->insert([
                        'barrio' => $data['barrio'],
                        'calle' => $data['calle'],
                        'altura' => $data['altura'],
                        'piso' => $data['piso'],
                        'departamento' => $data['dpto'],
                        'postal' => $data['postal']
                    ]);

                    log_message(3,$domicilioId);
                    if( $domicilioId !== false  ) {
                        $personaId = $personasModel->insert([
                            'id_users' => user()->id,
                            'nombre' => $data['nombre'],
                            'apellido' => $data['apellido'],
                            'id_domicilio' => $domicilioId,
                            'DNI' => $data['dni'],
                            'fecha_nacimiento' => $data['fechaNacimiento'],
                            'mail' => user()->email,
                            'genero' => $data['genero']
                        ]);
    
                        if( $personaId ) {
                            $data['isComplete'] = true;
                            $persona = $personas->getPersonaByUser(user()->id);
                            $domicilio = $domicilioModel->getDomicilio( $persona['id_domicilio'] );
                    
                            
                            $_SESSION['persona'] = $persona;
                            $_SESSION['domicilio'] = $domicilio;
                        }
                    }
                } catch (\Throwable $th) {
                    return redirect()->back()->withInput()->with('errors',[
                        'server' => 'Ocurrio un error de nuestro lado, danos tiempo de arreglarlo!'
                    ]);
                }

                

        } else {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        
        



        echo view('header');
        echo view('usuarios/perfil',$data);
        echo view('footer');
    }


    // public function getLocalidades () {
    //     $localidades = "";
    //     $ModelLocalidades = new LocalidadesModel($db);

    //     $id = $this->request->getVar('id_provincia');

    //     if( $id) {
    //         $localidades = $ModelLocalidades->getLocalidades($id);

    //         return $this->response->setJSON($localidades);
    //     }
    // }
}
