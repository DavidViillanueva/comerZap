<?php namespace App\Models;


use CodeIgniter\Model;

class CommerceModel extends Model {
    
    protected $table = 'comercio';

    public function getCommerce ( $id = false ) {
        if( $id ) {
            return $this->asArray()
                ->where(['id_comercio' => $id ])
                ->first();
        }

        return $this->findAll();
    }

}