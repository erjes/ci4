<?php

namespace App\Models;

use CodeIgniter\Model;

class Loginmodel extends Model
{
    protected $table            = 'InventoryLogin';
    protected $primaryKey       = 'Id';
    protected $allowedFields    = ['Id','email','password'];
}
