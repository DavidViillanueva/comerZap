<?php 

namespace App\Models;
use CodeIgniter\Model;


class CategoriaServicioModel extends Model {
    
    protected $table = 'categoria_servicio';

    protected $primaryKey = 'id_categoria_servicio';
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['nombre'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getCategoriaServicio ( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_categoria_servicio' => $id ])
                ->first();
        }

        return $this->findAll();
    }

}