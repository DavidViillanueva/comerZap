<?php namespace App\Models;


use CodeIgniter\Model;
/** utilizo este model para cargar la lista proveedor, del formulario crear comercio */
class RubroModel extends Model {
    protected $table = 'rubro';
    protected $primaryKey = 'id_rubro';
    protected $returnType     = 'array';

    public function getRubros () {
        return $this->findAll();
    }
}