<?php

namespace App\Models;

use CodeIgniter\Model;

class RemarksModel extends Model
{
    protected $table            = 'InventoryRemarks';
    protected $primaryKey       = 'Id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['requestOrderNumber','InventoryAPKId','documentimage','encodedimage','status','lostitem','damageditem','lostamount', 'damagedamount'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
