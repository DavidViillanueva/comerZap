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

    public function isProveedor ( $id_persona = false ) {
        // Para determinar si la persona que esta usando el sistema es proveedor
        // Retorna false si no es proveedor y si no retorna el ID
        log_message(3,$id_persona);
        $data = false;
        if( $id_persona ) {
            $data = ( $this->asArray()
                ->where(['id_persona' => $id_persona])
                ->first() ) ? $this->asArray()
                ->where(['id_persona' => $id_persona])
                ->first()['id_proveedor'] : false;
        }

        return $data;
    }


}