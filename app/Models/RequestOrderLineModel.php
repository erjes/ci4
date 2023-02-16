<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestOrderLineModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'RequestOrderLine';
    protected $primaryKey       = 'requestOrderLineId';
    protected $returnType       = 'array';
    protected $allowedFields    = ['requestOrderLineId','requestOrderId','barcode'];
}
