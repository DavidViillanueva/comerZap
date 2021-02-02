<?php namespace App\Models;


use CodeIgniter\Model;
/** utilizo este model para cargar la lista proveedor, del formulario crear comercio */
class ProveedorModel extends Model {
    
    protected $table = 'proveedor';

    protected $primaryKey = 'id_proveedor';
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['id_persona', 'Id_rubro','cuil_cuit', 'ventas_concretadas','suma_puntaje', 'status_proveedor', 'id_estado', 'productor_local'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getProveedor ( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_proveedor' => $id ])
                ->first();
        }

        return $this->findAll();
    }

}