<?php namespace App\Models;


use CodeIgniter\Model;

class ComercioModel extends Model {
    
    protected $table = 'comercio';

    protected $primaryKey = 'id_comercio';
    protected $returnType     = 'array';
    //protected $useSoftDeletes = true;
    protected $allowedFields = ['id_proveedor', 'id_domicilio','id_categoria', 'nombre_comercio','delivery', 'licencia_comercial', 'pagina_web', 'mail', 'descripcion'];

    //hago validacion de algunos campos
    protected $validationRules    = [
        'nombre_comercio'=>'required|is_unique[comercio.nombre_comercio]|alpha_numeric_space|min_length[5]',
        'licencia_comercial'=>'required|is_unique[comercio.licencia_comercial]',
        'pagina_web'=>'is_unique[comercio.pagina_web]',
        'mail'=>'required|valid_email|is_unique[comercio.mail]'
    ];
    protected $validationMessages = [
        'nombre_comercio'=>[
            'required'=>'El nombre del Comercio es requerido.',
            'is_unique'=>'El nombre del Comercio ya esta registrado.'
        ],
        'licencia_comercial'=>[
            'required'=>'La Licencia Comercial es requerida.',
            'is_unique'=>'La Licencia Comercial que intenta guardar ya esta siendo utilizada.',
        ],
        'pagina_web'=>[
            'is_unique'=>'La pagina web ingresada ya esta registrada por otro comercio.',
        ],
        'mail'=>[
            'required'=>'El correo electronico es requerido',
            'valid_email'=>'Debe ingresar un Correo Electronico valido.',
            'is_unique'=>'El correo electronico ingresado ya esta siendo usado.',
        ],
    ];
    protected $skipValidation     = false;

    /*public function getCommerce ( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_comercio' => $id ])
                ->first();
        }

        return $this->findAll();
    }*/

}