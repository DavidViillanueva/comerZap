<?php namespace App\Models;


use CodeIgniter\Model;
/** utilizo este model para cargar la lista domicilio, del formulario crear comercio */
class DomicilioModel extends Model {
    
    protected $table = 'domicilio';

    protected $primaryKey = 'id_domicilio';
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['id_localidad', 'barrio','calle', 'altura','piso', 'departamento','postal'];

    protected $validationRules    = [];
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