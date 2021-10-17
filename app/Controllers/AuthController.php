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

    public function editProfileScreen ($type = null,$id = null) {
        // El id puede ser del domicilio o de la persona, se maneja en la ruta que se manda
        $personasModel = new personaModel($db);
        $domicilioModel = new domicilioModel($db);

        $data = [
            'type' => $type
        ];


        if ( $this->request->getMethod() === 'get' ) {
            if( $type !== 'personalEdit' && $type !== 'addressEdit') {
                return redirect()->back();
            }
    
            if( $id !== null && $type == 'addressEdit') {
                $domicilio = $domicilioModel->getDomicilio( $id );
    
                if( $domicilio == false ) {
                    return redirect()->back();
                }
    
                $data ['domicilio'] = $domicilio;
            }
    
            echo view('header');
            echo view('usuarios/perfil/edit',$data);
            echo view('footer');
        } else {
            if( $this->request ->getMethod() === 'post') {
                if( $type !== 'personalEdit' && $type !== 'addressEdit') {
                    return redirect()->back();
                }

                if( $type === 'personalEdit' ) {
                    $editedData = [
                        'nombre'  => $this->request->getPostGet('nombre'),
                        'apellido' => $this->request->getPostGet('apellido'),
                        'dni' => $this->request->getPostGet('dni'),
                        'fecha_nacimiento'  => $this->request->getPostGet('fechaNacimiento')
                    ];
                    
                    if ( $personasModel->update($id,$editedData) === false ) {
                        return redirect()->back()->withInput()->with('errors', $personasModel->errors());;
                    } else {
                        return redirect()->route('profile');
                    }

                }

                if( $type === 'addressEdit' ){
                    log_message(3, $id);
                    $editedData = [
                        'calle' => $this->request->getPostGet('calle'),
                        'barrio' => $this->request->getPostGet('barrio'),
                        'altura' => $this->request->getPostGet('altura'),
                        'piso'  => $this->request->getPostGet('piso'),
                        'departamento'  => $this->request->getPostGet('dpto'),
                        'postal'  => $this->request->getPostGet('postal')
                    ];

                    if ( $domicilioModel->update($id,$editedData) === false ) {
                        return redirect()->back()->withInput()->with('errors', $domicilioModel->errors());;
                    } else {
                        return redirect()->route('profile');
                    }
                }
            }
        }
    }

    
}
