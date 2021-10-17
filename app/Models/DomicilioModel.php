<?php namespace App\Models;


use CodeIgniter\Model;
/** utilizo este model para cargar la lista domicilio, del formulario crear comercio */
class DomicilioModel extends Model {
    
    protected $table = 'domicilio';

    protected $primaryKey = 'id_domicilio';
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['id_localidad', 'barrio','calle', 'altura','piso', 'departamento','postal'];

    protected $validationRules    = [
        'barrio' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar un barrio.'
            ]
        ],
        'calle' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar una calle.'
            ]
        ], 
        'altura' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar una altura.'
            ]
        ],
        'piso' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar un piso.'
            ]
        ], 
        'departamento' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar un departamento.'
            ]
        ],
        'postal' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Debes ingresar un codigo postal.'
            ]
        ]
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    

    public function getDomicilio ( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_domicilio' => $id ])
                ->first();
        }

        return $this->findAll();
    }

}