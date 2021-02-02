<?php namespace App\Models;


use CodeIgniter\Model;
/** utilizo este model para cargar la lista categoria comercio, del formulario crear comercio */
class CategoriaComercioModel extends Model {
    
    protected $table = 'categoria_comercio';

    protected $primaryKey = 'id_categoria_comercio';
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['nombre'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getCategoriaComercio ( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_categoria_comercio' => $id ])
                ->first();
        }

        return $this->findAll();
    }

}