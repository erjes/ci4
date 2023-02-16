<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    protected $table            = 'InventoryAndroid';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['InventoryAPKId','requestOrderNumber','requestOrderId','latitude','longitude','status'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
