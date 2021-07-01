<?php namespace App\Models;


use CodeIgniter\Model;

class LocalidadesModel extends Model {
    protected $table = 'localidad';

    public function getLocalidades( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_provincia' => $id ])
                ->findAll();
        }

        return $this->findAll();
    }
}