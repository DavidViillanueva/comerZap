<?php namespace App\Models;


use CodeIgniter\Model;

class ProvinciasModel extends Model {
    protected $table = 'provincia';

    public function getProvincias( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_provincia' => $id ])
                ->first();
        }

        return $this->findAll();
    }

    
}