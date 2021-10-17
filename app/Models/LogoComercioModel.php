<?php 

namespace App\Models;
use CodeIgniter\Model;

class LogoComercioModel extends Model{
    protected $table = 'logo_comercio';
    protected $primaryKey = 'id_logo_comercio';
    protected $useAutoIncrement = true;  
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_comercio', 'tipo_imagen', 'imagen'];


    protected $useTimestamps = true;
    protected $createdField  = 'created_at'; //habria que crear estas columnas para llevar un seguimiento de la fecha de creacion
    protected $updatedField  = 'updated_at'; //habria que crear estas columnas para llevar un seguimiento de la fecha de modificacion
    //protected $deletedField  = 'deleted_at';
    //solo hago validacion de algunos campos
    protected $validationMessages = [
        'logo' => [
            'uploaded[logo]',
            'mime_in[logo,image/jpg,image/jpeg,image/png,image/gif]'
        ]
    ];
}