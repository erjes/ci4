<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestOrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'RequestOrder';
    protected $primaryKey       = 'requestOrderId';
    protected $returnType       = 'array';
    protected $allowedFields    = ['requestOrderNumber','requestOrderId'];
}
