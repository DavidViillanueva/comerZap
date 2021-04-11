<?php 

namespace App\Models;
use CodeIgniter\Model;

class ServicioModel extends Model{

    protected $table      = 'servicio';
    protected $primaryKey = 'id_servicio';

    protected $useAutoIncrement = true;  

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;   //no hay que eliminar el registro, solo habria que cambiarle el estado.

    protected $allowedFields = ['id_proveedor', 'id_categoria_servicio','matricula','nombre_fantacia','activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta'; //habria que crear estas columnas para llevar un seguimiento de la fecha de creacion
    protected $updatedField  = 'fecha_edit'; //habria que crear estas columnas para llevar un seguimiento de la fecha de modificacion
    //protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        //'nombre_fantacia'=>'required|alpha_numeric_space|min_length[3]',
        //'matricula'=>'required|is_unique'
    ];
    protected $validationMessages = [
        //'nombre_fantacia'=>[
          //  'required'=>'Nombre del Servicio Requerido.',
            //'is_unique'=>'Servicio ya registrado.'
        //],
        //'matricula'=>[
          //  'required'=>'Número de Matrícula Requerida.',
            //'is_unique'=>'La Matrícula ya a sido ingresada.',
        //]
    ];
    protected $skipValidation     = false;

    public function getServicio ( $id = false ) {
      if( $id ) {
          return $this->asArray()
              ->where(['id_servicio' => $id ])
              ->first();
      }

      return $this->findAll();
    }
}

?>