<?php namespace App\Models;


use CodeIgniter\Model;

class personaModel extends Model {
    protected $table = 'persona';
    protected $primaryKey = 'id_persona';

    protected $allowedFields = ['id_users','nombre','apellido','id_domicilio','DNI','fecha_nacimiento','mail','genero'];
    protected $validationRules = [
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
        'fecha_nacimiento' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar un fechaNacimiento.'
            ]
        ]
    ];


    
    
    // Esta funcion es para verificar si el usuario completo sus datos como persona
    
    public function isComplete( $id_user = false ) {
        $user = false;
        if( $id_user ) {
            $user = ($this->asArray()
                ->where(['id_users' => $id_user ])
                ->first())?true:false;
        }

        return $user;
    }

    public function getPersonaByUser ( $id_user = false ) {
        if( $id_user ) {
            return $this->asArray()
                ->where(['id_users' => $id_user ])
                ->first();
        }

        return false;
    }
}